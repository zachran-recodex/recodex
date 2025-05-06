<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;

class ImageService
{
    protected $manager;

    /**
     * Create a new ImageService instance
     */
    public function __construct()
    {
        // Use Imagick if available, otherwise fall back to GD
        $driver = extension_loaded('imagick') ? new ImagickDriver() : new GdDriver();
        $this->manager = new ImageManager($driver);
    }

    /**
     * Process and store image with multiple dimensions
     *
     * @param \Illuminate\Http\UploadedFile $uploadedFile
     * @param string $directory
     * @return string The path to the original image
     */
    public function storeProjectImage($uploadedFile, $directory = 'projects')
    {
        // Generate a unique filename
        $filename = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();

        // Store original image
        $originalPath = $uploadedFile->storeAs($directory . '/original', $filename, 'public');

        // Define size dimensions for different views
        $dimensions = [
            'home' => [516, 390],
            'project' => [626, 390],
            'detail' => [1286, 590]
        ];

        // Create resized versions
        $this->createResizedVersions($originalPath, $dimensions, $directory, $filename);

        return $originalPath;
    }

    /**
     * Create resized versions of an image
     *
     * @param string $originalPath
     * @param array $dimensions
     * @param string $directory
     * @param string $filename
     * @return void
     */
    protected function createResizedVersions($originalPath, $dimensions, $directory, $filename)
    {
        // Get the full path to the original image
        $originalFullPath = Storage::disk('public')->path($originalPath);

        // Load the image with Intervention
        $image = $this->manager->read($originalFullPath);

        foreach ($dimensions as $type => $size) {
            // Ensure directory exists
            $resizeDir = $directory . '/' . $type;
            if (!Storage::disk('public')->exists($resizeDir)) {
                Storage::disk('public')->makeDirectory($resizeDir);
            }

            // Create a resized copy with perfect dimensions
            $resizedImage = clone $image;
            $resizedImage->cover($size[0], $size[1], 'center');

            // Save the resized image
            $resizedPath = Storage::disk('public')->path($resizeDir . '/' . $filename);
            $resizedImage->save($resizedPath);
        }
    }

    /**
     * Delete an image and all of its resized versions
     *
     * @param string $path
     * @param string $directory
     * @return void
     */
    public function deleteImage($path, $directory = 'projects')
    {
        // Extract the filename from the full path
        $filename = basename($path);

        // Delete original and all resized versions
        $paths = [
            $directory . '/original/' . $filename,
            $directory . '/home/' . $filename,
            $directory . '/project/' . $filename,
            $directory . '/detail/' . $filename
        ];

        foreach ($paths as $path) {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
    }

    /**
     * Get the URL for a resized image
     *
     * @param string|null $imagePath
     * @param string $size
     * @return string|null
     */
    public function getImageUrl($imagePath, $size = 'original')
    {
        if (empty($imagePath)) {
            return null;
        }

        $filename = basename($imagePath);
        $directory = dirname(dirname($imagePath)); // Get the base directory
        $resizedPath = $directory . '/' . $size . '/' . $filename;

        if (Storage::disk('public')->exists($resizedPath)) {
            return Storage::url($resizedPath);
        }

        // Fallback to original if resized version doesn't exist
        return Storage::url($imagePath);
    }
}
