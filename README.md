## RubricaActiveDirectory - Project based on Laravel 8

<img src="https://github.com/MaoX17/RubricaActiveDirectory/blob/master/public/img/ss.png">

### RubricaActiveDirectory

Address book from data in Active Directory with qr-code dinamically generated

#### <a href="https://rubrica.provincia.prato.it/">Demo</a>

#### RubricaActiveDirectory - Setup

git clone https://github.com/MaoX17/RubricaActiveDirectory.git <br/>
Create a file (.env) from example (.env.example) <br/>

```
cd RubricaActiveDirectory
cd storage
mkdir logs
mkdir framework
mkdir framework/cache && framework/cache/data
mkdir framework/sessions
mkdir framework/testing
mkdir framework/views
```

npm install
npm run dev or npm run prod

composer install
composer update

Configure web server <br/>

Example:

```
<VirtualHost ip.add.re.ss:80>

       ServerName  rubrica.example.it

       DocumentRoot /var/www/vhost/RubricaActiveDirectory/public

include /etc/httpd/conf.d/redirect_https.inc


       <Location />
        Require all denied
       </Location>
</VirtualHost>

<VirtualHost ip.add.re.ss:443>

        ServerName  rubrica.example.it

        DocumentRoot /var/www/vhost/RubricaActiveDirectory/public

        SSLEngine on

        # Certificato del server
        SSLCertificateKeyFile /etc/httpd/conf/ssl.key/cert.key
        SSLCertificateFile /etc/httpd/conf/ssl.crt/server.pem
        SSLCertificateChainFile /etc/httpd/conf/ssl.crt/chain.pem
        # Tipo certificati accettati (default)
        SSLCipherSuite ALL:!ADH:RC4+RSA:+HIGH:+MEDIUM:+LOW:+SSLv2:+EXP:-eNULL
        # Tipo valid. certificato (none,optional,require,optional_no_ca)
        SSLVerifyClient none


<Directory /var/www/vhost/RubricaActiveDirectory/public/>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Require all granted
</Directory>


</VirtualHost>

```

Data mapping:

title = this field HAVE NOT to be empty - if this field is empty the record will not shown on address book <br/>
cn = Name & Surname <br/>
department = Deparment<br/>
company = Company<br/>
TelephoneNumber = Telephone Number<br/>
Email = Email<br/>

### Server installation

#### Nodejs update on Centos 7

```


curl -sL https://rpm.nodesource.com/setup_12.x | sudo bash -
yum list | grep node
npm --version
yum clean all && sudo yum makecache fast
yum remove -y nodejs npm
yum list available nodejs
yum install nodejs
npm install
npm run prod


```

#### A good coffee...

<p><a href="https://www.buymeacoffee.com/MaoX17"> <img align="left" src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" height="50" width="210" alt="MaoX17" /></a></p><br><br>
