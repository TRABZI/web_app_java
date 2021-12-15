node {

    stage('Clone repository') {
        	git 'https://github.com/TRABZI/web_app_java.git'
    }


    stage('SonarQube Built-in Code analysis') {
        def scannerHome = tool 'sonar'
        withSonarQubeEnv('sonar'){
               sh "${scannerHome}/bin/sonar-scanner -Dsonar.host.url=http://141.95.160.233:9000/ -Dsonar.projectName=javaWebApp -Dsonar.projectVersion=${env.BUILD_NUMBER} -Dsonar.projectKey=jnknsSnrqb2  -Dsonar.sources=./ -Dsonar.language=java -Dsonar.java.binaries=."
        }
    }

    stage('Gate Quality Pass'){
        def qualitygate = waitForQualityGate()
        if (qualitygate.status != "OK") {
                error "Pipeline aborted due to quality gate coverage failure: ${qualitygate.status}"
        }
    }

   stage('Maven Compile &  Package'){
     def mvnHome = tool name: 'maven', type: 'maven'
     sh "echo '${mvnHome}/bin/mvn' "
     sh "${mvnHome}/bin/mvn package"
   }

}
