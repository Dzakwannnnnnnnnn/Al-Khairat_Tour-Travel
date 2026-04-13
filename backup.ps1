# Al-Khairat Project Backup Script
$timestamp = Get-Date -Format "yyyy-MM-dd_HH-mm-ss"
$backupDir = "backups"
$zipName = "$backupDir\Backup_$timestamp.zip"

if (-not (Test-Path $backupDir)) {
    New-Item -ItemType Directory -Path $backupDir
}

Write-Host "Creating backup: $zipName..." -ForegroundColor Cyan

# Files/Folders to exclude
$exclude = @("node_modules", "vendor", ".git", "backups", "storage/framework/cache", "storage/framework/sessions", "storage/framework/views")

# Get items to compress, excluding the big ones
$items = Get-ChildItem -Path . -Exclude $exclude

# Filter storage manually since -Exclude doesn't handle nested paths well
$items = $items | Where-Object { 
    $_.FullName -notmatch "node_modules" -and 
    $_.FullName -notmatch "vendor" -and 
    $_.FullName -notmatch ".git" -and 
    $_.FullName -notmatch "backups"
}

Compress-Archive -Path $items -DestinationPath $zipName -Force

Write-Host "Backup completed successfully!" -ForegroundColor Green
Write-Host "File location: $zipName" -ForegroundColor Yellow


