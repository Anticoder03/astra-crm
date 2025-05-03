<?php

if (! function_exists('formatCustomerName')) {
    /**
     * Format the customer's name to a proper format (First Last).
     *
     * @param  string  $firstName
     * @param  string  $lastName
     * @return string
     */
    function formatCustomerName($firstName, $lastName)
    {
        return ucwords(strtolower($firstName)) . ' ' . ucwords(strtolower($lastName));
    }
}

if (! function_exists('formatPhoneNumber')) {
    /**
     * Format a phone number into a standard format.
     *
     * @param  string  $phoneNumber
     * @return string
     */
    function formatPhoneNumber($phoneNumber)
    {
        // Remove non-numeric characters
        $formatted = preg_replace('/\D/', '', $phoneNumber);

        // Format as (XXX) XXX-XXXX
        if (strlen($formatted) == 10) {
            return '(' . substr($formatted, 0, 3) . ') ' . substr($formatted, 3, 3) . '-' . substr($formatted, 6, 4);
        }

        return $formatted;  // return as is if not valid length
    }
}

if (! function_exists('calculateCustomerAge')) {
    /**
     * Calculate the age of a customer from their birthdate.
     *
     * @param  string  $birthdate
     * @return int
     */
    function calculateCustomerAge($birthdate)
    {
        $dob = \Carbon\Carbon::parse($birthdate);
        return $dob->age;  // Using Carbon's built-in age calculation
    }
}

if (! function_exists('formatCurrency')) {
    /**
     * Format a currency value in INR.
     *
     * @param  float  $amount
     * @return string
     */
    function formatCurrency($amount)
    {
        return '₹' . number_format($amount, 2);
    }
}
