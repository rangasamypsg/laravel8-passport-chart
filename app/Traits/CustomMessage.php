<?php

namespace App\Traits;

trait CustomMessage {
   
    public static function printUserRegisterDetails() {
       
        $data =  "User register successfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printUserLogin() {
       
        $data =  "User login successfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printUserNotFound() {
       
        $data =  "Please enter the valid user details";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerDetails() {
       
        $data =  "Customer successfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerNotFound() {
       
        $data =  "Customer not found.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printNoRecords() {
       
        $data =  "OOPS! No records found.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerRegisterSuccess() {
       
        $data =  "Customer created  successfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerRegisterFailure() {
       
        $data =  "Customer created  unsuccessfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printShowRecords() {
       
        $data =  "Customer retrieved successfully..";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerUpdateSuccess() {
       
        $data =  "Customer updated  successfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerUpdateFailure() {
       
        $data =  "Customer updated  unsuccessfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerDeleteSuccess() {
       
        $data =  "Customer deleted  successfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }

    public static function printCustomerDeleteFailure() {
       
        $data =  "Customer deleted  unsuccessfully.";

        return  ( isset( $data ) && !empty( $data ) ? $data : '');
    }
    
}