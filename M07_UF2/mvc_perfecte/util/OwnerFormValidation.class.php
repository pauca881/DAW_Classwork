<?php

require_once "util/OwnerMessage.class.php";

/**
 * Clase utilizada para validar la entrada del formulario del usuario para un objeto Owner.
 *
 * @author Luis Enrique, Christian Sastre, Julian Ortega, Pau López
 */

class OwnerFormValidation
{
    // Define constants for different operations and their associated required fields
    public const INSERT = array("nif", "name", "phone", "email");
    public const UPDATE = array("nif", "name");
    public const SELECT = array("nif");
    public const DELETE = array("nif");

    /**
     * Validates and sanitizes user input based on the specified required fields.
     *
     * @param array $requiredFields An array of required fields for validation.
     * @return Owner Returns an Owner object with sanitized and validated data.
     */
    public static function checkData($requiredFields)
    {
        // Initialize variables with default values
        $nif = " ";
        $name = " ";
        $phone = " ";
        $email = " ";

        // Retrieve values from the POST data if they are set
        if (isset($_POST["nif"])) $nif = $_POST["nif"];
        if (isset($_POST["name"])) $name = $_POST["name"];
        if (isset($_POST["phone"])) $phone = $_POST["phone"];
        if (isset($_POST["email"])) $email = $_POST["email"];


        // Check if fields are required for validation
        $nifRequired = in_array("nif", $requiredFields);
        $nameRequired = in_array("name", $requiredFields);
        $phoneRequired = in_array("phone", $requiredFields);
        $emailRequired = in_array("email", $requiredFields);

        // Check and sanitize the NIF field
        if ($nif != " " || $nifRequired) {
            $nif = htmlspecialchars(trim($nif));
            $pattern = '/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/';
            if (empty($nif) && $nifRequired)                 $_SESSION["error"][] = OwnerMessage::FORM_EMPTY_NIF;
            else if (!empty($nif) && !preg_match($pattern, $nif)) $_SESSION["error"][] = OwnerMessage::FORM_INVALID_NIF;
        }

        // Check and sanitize the Name field
        if ($name != " " || $nameRequired) {
            $name = htmlspecialchars(trim($name));
            $pattern = '/^[a-zA-Z ]+$/';
            if (empty($name) && $nameRequired)                 $_SESSION["error"][] = OwnerMessage::FORM_EMPTY_NAME;
            else if (!empty($name) && !preg_match($pattern, $name)) $_SESSION["error"][] = OwnerMessage::FORM_INVALID_NAME;
        }

        // Check and sanitize the Phone field
        if ($phone != " " || $phoneRequired) {
            $phone = htmlspecialchars(trim($phone));
            $pattern = "/^[0-9]{9}$/";
            if (empty($phone) && $phoneRequired)                 $_SESSION["error"][] = OwnerMessage::FORM_EMPTY_PHONE;
            else if (!empty($phone) && !preg_match($pattern, $phone)) $_SESSION["error"][] = OwnerMessage::FORM_INVALID_PHONE;
        }

        // Check and sanitize the Email field
        if ($email != " " || $emailRequired) {
            $email = htmlspecialchars(trim($email));
            if (empty($email) && $emailRequired)                              $_SESSION["error"][] = OwnerMessage::FORM_EMPTY_EMAIL;
            else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $_SESSION["error"][] = OwnerMessage::FORM_INVALID_EMAIL;
        }

        // Return an Owner object with sanitized and validated data
        return new Owner($nif, $name, $email, $phone);
    }
}
