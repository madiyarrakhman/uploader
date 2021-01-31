<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'dlt_uploader');

// Project repository
set('repository', 'https://github.com/madiyarrakhman/uploader.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', ['.env', 'composer.phar']);
set('shared_dirs', ['runtime', 'public/uploads']);

// Writable dirs by web server 
set('writable_dirs', ['runtime/cache', 'public/uploads']);


// Hosts

host('cdn.dlt.kz')
    ->stage('hoster')
    ->user('root')
    ->set('deploy_path', '/var/www/dlt-price');
    

// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
