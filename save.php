<?php
    include('db.php');
    $info = json_decode(file_get_contents("php://input"));
    $error = false;
    $message = '';
    if (count($info) > 0) {
        $firstname = $info->firstname;
        $lastname = $info->lastname;
        $gender = $info->gender;
        $address = $info->address;
        $city = $info->city;
        $postalcode = $info->postalcode;
        $country = $info->country;
        $telnumber = $info->telnumber;

        $btn_name = $info->btnAction;
        if ($btn_name == "Insert") {
            if ($connect->query("INSERT INTO tbl_customer (Firstname, Lastname,Gender,Address,City,PostalCode,Country, TelNumber) values ('$firstname', '$lastname','$gender','$address','$city','$postalcode', '$country','$telnumber')")) {
                $message= "Customer Added Successfully";
            } else {
                $message ="Failed";
                $error=true;
            }
        }
        if ($btn_name == "Update") {
            $id    = $info->id;
            if ($connect->query("UPDATE tbl_customer SET Firstname='$firstname', Lastname='$lastname', Gender='$gender', Address='$address', City='$city',PostalCode='$postalcode', Country='$country', TelNumber='$telnumber' where ID='$id'")) {
                $message= 'Customer Updated Successfully';
            } else {
                $message= 'Failed';
                $error= true;
            }
        }
        $output = array(
          'error'  => $error,
          'message' => $message
         );

        echo json_encode($output);
    }
?>