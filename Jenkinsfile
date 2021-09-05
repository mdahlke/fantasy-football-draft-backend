@Library('jenkins-shared-libs') _


pipeline {
  agent any
    environment{
        PROJECT_NAME = "Laravel Backend Auth"
        DEV_DIR  = "laravel-backend-auth/dev"
        PROD_DIR = "laravel-backend-auth/production"
        DEV_BRANCH = "dev"
        PROD_BRANCH = "main"
    }

  stages {

      stage("Test Build"){
          steps {
              testBuild()
          }
        post {
            success {
                script {
                 env.BUILD_COMPLETED = "true";
                }
            }
            failure {
                script {
                 env.BUILD_COMPLETED = "false";
                }
            }
        }
      } // stage(Test Build)

    stage('Dev Deploy') {
        when {
            expression {env.BITBUCKET_TARGET_BRANCH == env.DEV_BRANCH}
            environment name: "BUILD_COMPLETED", value: "true"
        }
      steps {
        echo 'Deploying to dev'
        dir("${env.SERVER_DIR_ROOT}/${env.DEV_DIR}") {
            script {
                env.REVERT_TO_HASH = bat(returnStdout: true, script: "@git rev-parse HEAD").trim()
                env.REVERT_TO_HASH_SHORT = bat(returnStdout: true, script: "@git rev-parse --short HEAD").trim()
            }

            bat "git fetch && git checkout -f ${env.GIT_COMMIT}"
            bat "composer install && npm install && npm run dev && php artisan optimize && php artisan migrate --force"
        }
      } // steps

      post {
          success {
              slackSend(
                  color: "good",
                  message: "dev deployment successful. head is now at ${env.GIT_COMMIT_SHORT}"
              )
          }
          failure {
             dir("${env.SERVER_DIR_ROOT}/${env.DEV_DIR}") {
                bat "git fetch && git checkout -f ${env.REVERT_TO_HASH}"
                bat "composer install && npm install && npm run prod && php artisan optimize && php artisan migrate --force"
             }

              slackSend(
                  color: "danger",
                  message: "failed to deploy to dev reverted to ${env.REVERT_TO_HASH_SHORT}"
              )
          }
      }
    }// stage dev deploy


      stage('Production Deploy') {
        when {
//             expression {env.BITBUCKET_TARGET_BRANCH == env.PROD_BRANCH}
            expression {env.BITBUCKET_TARGET_BRANCH?.startsWith('release/')}
            environment name: "BUILD_COMPLETED", value: "true"
        }
        steps {
            echo 'Deploying to production'
            dir("${env.SERVER_DIR_ROOT}/${env.PROD_DIR}") {
                script {
                    env.REVERT_TO_HASH = bat(returnStdout: true, script: "@git rev-parse HEAD").trim()
                    env.REVERT_TO_HASH_SHORT = bat(returnStdout: true, script: "@git rev-parse --short HEAD").trim()
                }
                bat "git fetch && git checkout -f ${env.GIT_COMMIT}"
                bat "composer install && npm install && npm run prod && php artisan optimize && php artisan migrate --force"

            }// dir

        }// steps

            post {
                success {
                    slackSend(
                            color: "good",
                            message: ":tada: Production deployment successful for ${env.PROJECT_NAME}! :tada: "
                    )
                }
                failure {
                     dir("${env.SERVER_DIR_ROOT}/${env.PROD_DIR}") {
                        bat "git fetch && git checkout -f ${env.REVERT_TO_HASH}"
                        bat "composer install && npm install && npm run prod && php artisan optimize && php artisan migrate --force"
                     }
                    slackSend(
                        color: "danger",
                        message: ":interrobang: Production deployment failed for ${env.PROJECT_NAME} :interrobang: "
                    )
                }
            }
      }// stage Production Deploy

  }

}



