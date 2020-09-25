<?php

namespace Deployer;
require 'recipe/laravel.php';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', false);
set('http_user', 'admin');
set('http_group', 'admin');
set('writable_mode', 'chown');
set('writable_chmod_recursive', true);
set('writable_use_sudo', true);

set('repository', 'https://github.com/Mohammad-Alavi/Samandoon-v2');

add('shared_files', [
//    '.env'
]);
add('shared_dirs', [
//    'storage'
]);
add('writable_dirs', [
//    'bootstrap/cache',
//    'storage',
//    'storage/app',
//    'storage/app/public',
//    'storage/framework',
//    'storage/framework/cache',
//    'storage/framework/sessions',
//    'storage/framework/views',
//    'storage/logs',
]);

set('branch', 'develop');

// Servers
// 171.22.24.18
host('denora')
//    ->user('admin')
//    ->port(22)
    ->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/id_rsa')
    ->forwardAgent(true)
    ->multiplexing(false)
    ->set('git_tty', false)
//    ->become('admin')
    ->set('deploy_path', '/home/admin/domains/denora.ir');

// Tasks

//task('upload:env', function () {
//    upload('.env.production', '{{deploy_path}}/shared/.env');
//})->desc('Environment setup');

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm72');
});
after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
//before('artisan:migrate', 'artisan:db:seed');
