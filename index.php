<?php
// Temporary index file
$dir = dirname(__FILE__);
$dir_name = basename($dir);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directory: ' . $dir_name . '</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #2980b9;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #3498db;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .file-list {
            background: #f8f9fa;
            border-radius: 4px;
            padding: 15px;
        }
        .file-list ul {
            list-style: none;
            padding: 0;
        }
        .file-list li {
            padding: 8px 10px;
            border-bottom: 1px solid #eee;
        }
        .file-list li:last-child {
            border-bottom: none;
        }
        .file-list a {
            color: #2980b9;
            text-decoration: none;
        }
        .file-list a:hover {
            text-decoration: underline;
        }
        .directory {
            font-weight: bold;
        }
        .file-size {
            color: #7f8c8d;
            font-size: 0.8em;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Directory: ' . $dir_name . '</h1>
    <a href="http://localhost:8888" class="back-link">← Back to projects list</a>
    
    <div class="file-list">
        <h2>Files:</h2>
        <ul>';
        
        // List files in this directory
        foreach (scandir($dir) as $file) {
            if ($file != "." && $file != "..") {
                $full_path = $dir . '/' . $file;
                $is_dir = is_dir($full_path);
                $file_size = $is_dir ? '' : '<span class="file-size">' . round(filesize($full_path) / 1024, 2) . ' KB</span>';
                $class = $is_dir ? 'directory' : '';
                
                echo '<li><a href="' . $file . '" class="' . $class . '">' . $file . '</a>' . $file_size . '</li>';
            }
        }
        
        echo '</ul>
    </div>
</body>
</html>';
?>