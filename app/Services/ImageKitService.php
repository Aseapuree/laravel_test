<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageKitService
{
    private string $privateKey;
    private string $urlEndpoint;
    private string $folder;

    public function __construct()
    {
        $this->privateKey  = config('services.imagekit.private_key');
        $this->urlEndpoint = config('services.imagekit.url_endpoint');
        $this->folder      = config('services.imagekit.folder', 'products');
    }

    /**
     * Sube un archivo a ImageKit y retorna la URL pública.
     */
    public function upload(UploadedFile $file, string $filename = null): string
    {
        $filename = $filename ?? Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '_' . time()
            . '.' . $file->getClientOriginalExtension();

        $response = \Illuminate\Support\Facades\Http::withBasicAuth($this->privateKey, '')
            ->attach('file', file_get_contents($file->getRealPath()), $filename)
            ->post('https://upload.imagekit.io/api/v1/files/upload', [
                'fileName' => $filename,
                'folder'   => $this->folder,
            ]);

        if (!$response->successful()) {
            throw new \Exception('Error al subir imagen a ImageKit: ' . $response->body());
        }

        return $response->json('url');
    }

    /**
     * Elimina un archivo de ImageKit por su fileId.
     * El fileId se obtiene de la respuesta al subir.
     */
    public function delete(string $fileId): void
    {
        \Illuminate\Support\Facades\Http::withBasicAuth($this->privateKey, '')
            ->delete("https://api.imagekit.io/v1/files/{$fileId}");
    }
}
