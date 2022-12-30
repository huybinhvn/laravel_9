pipeline {
    agent {
        dockerfile true
    }
    stages {
        stage("Build") {
            steps {
                sh 'php --version'
                sh 'composer install'
                sh 'composer --version'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }
        stage("Unit test") {
            steps {
                script {
                    docker.image('mariadb:10.5.9').withRun('-e "MYSQL_DATABASE=dev_local" -e "MYSQL_ROOT_PASSWORD=admin"') { c ->
                        docker.image('mariadb:10.5.9').inside("--link ${c.id}:db_mysql") {
                            /* Wait until mysql service is up */
                            sh 'while ! mysqladmin ping -hdb --silent; do sleep 1; done'
                        }
                        sh "composer check-style"
                    }
                }
            }
        }
    }
}