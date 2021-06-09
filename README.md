## RubricaActiveDirectory - Project based on Laravel 8

### RubricaActiveDirectory

Address book from data in Active Directory with qr-code dinamically generated

### Demo:
https://rubrica2.provincia.prato.it

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

Configure web server <br/>

Data mapping:

title = this field HAVE NOT to be empty - if this field is empty the record will not shown on address book <br/>
cn = Name & Surname <br/>
department = Deparment<br/>
company = Company<br/>
TelephoneNumber = Telephone Number<br/>
Email = Email<br/>

<p><a href="https://www.buymeacoffee.com/MaoX17"> <img align="left" src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" height="50" width="210" alt="MaoX17" /></a></p><br><br>

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
