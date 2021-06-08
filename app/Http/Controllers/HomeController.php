<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Adldap\Laravel\Facades\Adldap;


//use App\Models\Contact;

use Illuminate\Http\Request;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{

    public function credits()
    {
        return view('credits');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $results = array();

        //Tutti utenti
        //$users = Adldap::search()->users()->get();
        $users = Adldap::search()->users()->whereHas('title')->sortBy('cn', 'asc')->get();



        //Aree e Servizi
        $i = 0;
        $tmp_servizi = array();
        $tmp_aree = array();
        foreach ($users as $user) {
            $tmp_servizi[$i] = $user->getDepartment();
            $tmp_aree[$i] = $user->getCompany();
            $i++;
            //echo "<br>";
        }
        $servizi = array_unique($tmp_servizi);
        $servizi = array_filter($servizi);
        $aree = array_unique($tmp_aree);
        $aree = array_filter($aree);


        return view('index', ['servizi' => $servizi, 'aree' => $aree, 'results' => $results]);

    }

    public function result(Request $request,$cognome,$servizio,$area)
    {

//        dd($request);

        if ($request->has('cognome')) {
            $cognome = $request->input('cognome');
            if ($cognome == null) {
                $cognome = "all";
            }
        }
        if ($request->has('servizio')) {
            $servizio = $request->input('servizio');
        }
        if ($request->has('area')) {
            $area = $request->input('area');
        }
        //Tutti utenti
        $users = Adldap::search()->users()->whereHas('title')->sortBy('cn', 'asc')->get();

        //dd($users);
        //Prelevo Aree e Servizi
        $i = 0;
        $tmp_servizi = array();
        $tmp_aree = array();
        foreach ($users as $user) {
            $tmp_servizi[$i] = $user->getDepartment();
            $tmp_aree[$i] = $user->getCompany();
            $i++;
        }
        $servizi = array_unique($tmp_servizi);
        $servizi = array_filter($servizi);

        $aree = array_unique($tmp_aree);
        $aree = array_filter($aree);

        $results = array();



//        echo "Cognome = ".$cognome."<br>";
  //      echo "Servizio =".$servizio."<br>";
    //    echo "Area = ".$area."<br>";


        //Ricerca:
        if ($cognome == "all") {
            //$search_cognome = '*';
            $array_search_cognome = ['cn', '*'];
        }
        elseif (strlen($cognome) == 1) {
            $array_search_cognome = ['cn', 'starts_with',$cognome];
        }
        else {
            //$search_cognome = $cognome;
            $array_search_cognome = ['cn', 'contains', $cognome];
        }

        if ($servizio == "all") {
            //$search_servizio = '*';
            $array_search_servizio = ['department', '*'];
        } else {
            //$search_servizio = $servizio;
            $array_search_servizio = ['department','=' ,$servizio];
        }

        if ($area == "all") {
            $array_search_area = ['company', '*'];
        } else {
            $array_search_area = ['company','=', $area];
        }

        $wheres = [
            $array_search_cognome,
            $array_search_servizio,
            $array_search_area
        ];


        $results = Adldap::search()->users()->whereHas('title')->where($wheres)->whereEnabled()->sortBy('cn', 'asc')->get();
        //$results = $users->whereHas('title')->where($wheres)->whereEnabled()->sortBy('cn', 'asc')->get();


        //dd($results->count());
        //dd($results);
        $obj_contact = array();
        if ($results->count() != 0) {

        $i = 0;
        foreach ($results as $user) {
            $obj_contact[$i] = new \App\Models\Contact;

            $obj_contact[$i]->setNomeCompleto($user->getDisplayName());
            $obj_contact[$i]->setEmail($user->getEmail());
            $obj_contact[$i]->setTel($user->getTelephoneNumber());
            $obj_contact[$i]->setJobTitle($user->getTitle());
            $obj_contact[$i]->setServizio($user->getDepartment());
            $obj_contact[$i]->setArea($user->getCompany());

            $obj_contact[$i]->setVcard("BEGIN:VCARD VERSION:4.0
FN:".$user->getDisplayName()."
ORG:Provincia di Prato
TITLE:".$user->getTitle()."
TEL;TYPE=work,voice;VALUE=uri:tel:+39-".$user->getTelephoneNumber()."
EMAIL:".$user->getEmail()."
END:VCARD");

            $i++;
        }
        }
        //dd($obj_contact);
        return view('index', ['servizi' => $servizi, 'aree' => $aree, 'results' => $obj_contact]);
    }










    public function test()
    {

        // Finding a user:
        $user = Adldap::search()->users()->find('paolo');
        // Searching for a user:
        //$search = Adldap::search()->where('cn', '=', 'John Doe')->get();

        //dd($user->title);

        /**
         * gli utenti disabilitati hanno UserAccountControl:Array ( [0] => 514 )
         */
/*
         echo "disabilitato:";
        $user = Adldap::search()->users()->find('paolo');
        print_r ($user->cn);
        print_r ($user->sn);
        print_r ($user->title);
        print_r ($user->physicaldeliveryofficename);
        print_r ($user->telephonenumber);
        print_r ($user->givenname);
        echo "UserAccountControl:";
        print_r ($user->UserAccountControl);
        echo "accountexpires:";
        print_r($user->accountexpires);


        echo $user->getDisplayName();
        echo "<br>";
        echo $user->getEmail();
        echo "<br>";
        echo $user->getTitle();
        echo "<br>";
        echo $user->getDepartment();
        echo "<br>";
        echo $user->getFirstName();
        echo "<br>";
        echo $user->getLastName();
        echo "<br>";
        echo $user->getPhysicalDeliveryOfficeName();
        echo "<br>";
        echo $user->getTelephoneNumber();
        echo "<br>";
        echo $user->getCompany();
        echo "<br>";
        echo $user->getMailNickname();
        echo "<br>";
        echo $user->getUserPrincipalName();
        echo "<br>";
        print_r($user->getProxyAddresses());
        echo "<br>";
        echo $user->getUserAccountControl();
        echo "<br>";
        echo $user->getAccountExpiry();
        echo "<br>";
        print_r($user->getShowInAddressBook());
        echo "<br>
        isExpired ??? ";
        echo $user->isExpired();
        echo "<br>
        DISABLED????";
        echo $user->isDisabled();
        echo "<br>";
        echo "<br>";


        echo "<br>";
        echo "<br>";
        echo "<br>";


echo "expired:";
        $user = Adldap::search()->users()->find('desy');
        print_r($user->cn);
        print_r($user->sn);
        print_r($user->title);
        print_r($user->physicaldeliveryofficename);
        print_r($user->telephonenumber);
        print_r($user->givenname);
        echo "UserAccountControl:";
        print_r($user->UserAccountControl);
        echo "accountexpires:";
        print_r($user->accountexpires);

        echo $user->getDisplayName();
        echo "<br>";
        echo $user->getEmail();
        echo "<br>";
        echo $user->getTitle();
        echo "<br>";
        echo $user->getDepartment();
        echo "<br>";
        echo $user->getFirstName();
        echo "<br>";
        echo $user->getLastName();
        echo "<br>";
        echo $user->getPhysicalDeliveryOfficeName();
        echo "<br>";
        echo $user->getTelephoneNumber();
        echo "<br>";
        echo $user->getCompany();
        echo "<br>";
        echo $user->getMailNickname();
        echo "<br>";
        echo $user->getUserPrincipalName();
        echo "<br>";
        print_r($user->getProxyAddresses());
        echo "<br>";
        echo $user->getUserAccountControl();
        echo "<br>";
        echo $user->getAccountExpiry();
        echo "<br>";
        print_r($user->getShowInAddressBook());
        echo "<br>
        isExpired ??? ";
        echo $user->isExpired();
        echo "<br>";
        echo "<br>
        DISABLED????";
        echo $user->isDisabled();
        echo "<br>";
        echo "<br>";

        echo "<br>";
        echo "<br>";
        echo "<br>";
*/


        /**
         * Un accoun valido ha UserAccountControl:Array ( [0] => 512 ) o 66048
         */

echo "valido:";
        $user = Adldap::search()->users()->find('maurizio');
        print_r($user->cn);
        print_r($user->sn);
        print_r($user->title);
        print_r($user->physicaldeliveryofficename);
        print_r($user->telephonenumber);
        print_r($user->givenname);
        echo "UserAccountControl:";
        print_r($user->UserAccountControl);
        echo "accountexpires:";
        print_r($user->accountexpires);

        echo "AAAAAAAAAAAAAAAAAAAAAAA <br> <br>";

        echo $user->getDisplayName();
        echo "<br>";
        echo $user->getEmail();
        echo "<br>";
        echo $user->getTitle();
        echo "<br>";
        echo $user->getDepartment();
        echo "<br>";
        echo $user->getFirstName();
        echo "<br>";
        echo $user->getLastName();
        echo "<br>";
        echo $user->getPhysicalDeliveryOfficeName();
        echo "<br>";
        echo $user->getTelephoneNumber();
        echo "<br>";
        echo $user->getCompany();
        echo "<br>";
        echo $user->getMailNickname();
        echo "<br>";
        echo $user->getUserPrincipalName();
        echo "<br>";
        print_r($user->getProxyAddresses());
        echo "<br>";
        echo $user->getUserAccountControl();
        echo "<br>";
        echo $user->getAccountExpiry();
        echo "<br>";
        print_r($user->getShowInAddressBook());
        echo "<br>
        isExpired ??? ";
        echo $user->isExpired();
        echo "<br>";
        echo "<br>
        DISABLED????";
        echo $user->isDisabled();
        echo "<br>";
        echo "<br>";


        //Tutti utenti
        $users = Adldap::search()->users()->sortBy('cn', 'asc')->get();

        //Aree e Servizi
        $i=0;
        $tmp_servizi = array();
        $tmp_aree = array();
        foreach ($users as $user) {
            $tmp_servizi[$i] = $user->getDepartment();
            $tmp_aree[$i] = $user->getCompany();
            $i++;
            //echo "<br>";
        }
        $servizi = array_unique($tmp_servizi);
        $servizi = array_filter($servizi);
        $aree = array_unique($tmp_aree);
        $aree = array_filter($aree);

        //dd($aree);
        //dd($user);

        // Running an operation under a different connection:
        //$users = Adldap::getProvider('other-connection')->search()->users()->get();

        // Creating a user:
        //$user = Adldap::make()->user([
//            'cn' => 'John Doe',
  //      ]);

        // Modifying Attributes:
        //$user->cn = 'Jane Doe';

        // Saving a user:
        //$user->save();








        return view('test', ['servizi' => $servizi, 'aree' => $aree]);
    }

}
