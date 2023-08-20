<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Log;

class ImportMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:movies {directory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import movies from a directory into the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $directory = rtrim($this->argument('directory'), DIRECTORY_SEPARATOR);

        if (!is_dir($directory)) {
            $this->error('The specified directory does not exist.');
            return 1;
        }

        $this->scanDirectory($directory, $directory);
        return 0;
    }

    protected function scanDirectory($directory, $rootDirectory)
    {
        if (!is_dir($directory)) {
            Log::warning("Failed to scan directory: {$directory} is not a directory.");
            return;
        }

        $files = scandir($directory);

        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $path = $directory . DIRECTORY_SEPARATOR . $file;

            if (is_dir($path)) {
                $this->scanDirectory($path, $rootDirectory);
            } else {
                $this->addMovieToDatabase($path, $rootDirectory);
            }
        }
    }

    protected function addMovieToDatabase($path, $rootDirectory)
    {
        // 檢查文件擴展名是否為合法的影片檔案
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if (!in_array($extension, ['mp4', 'mpeg', 'mov'])) {
            Log::info("Skipped non-movie file: {$path}");
            return;
        }

        $subDirectory = ltrim(str_replace(dirname($rootDirectory), '', $rootDirectory), DIRECTORY_SEPARATOR);
        $relativePath = ltrim(str_replace($rootDirectory, '', $path), DIRECTORY_SEPARATOR);
        $videoPath = $subDirectory . DIRECTORY_SEPARATOR . $relativePath;

        $fileInfo = pathinfo($relativePath);

        // 用檔名作為標題，不包括擴展名
        $title = $fileInfo['filename'];

        DB::table('movies')->insert([
            'title' => $title,
            'description' => $path, // 插入影片的絕對路徑
            'video_path' => $videoPath, // 插入根目錄最後一部分 + 根目錄之後的路徑
            'view_count' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->info('Imported: ' . $videoPath);
    }
}
