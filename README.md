## ** Technologies used in the script: ** Bootstrap, PHP, XML, JavaScript, GIT, composer.

# XML Catalog Updater is a PHP script designed to create and update a catalog of goods by retrieving data from an XML file. The script ensures that the XML file is up-to-date by checking its age and, if necessary, downloading an updated version from the donor site.

** Features: **

** Catalog Creation: ** The script generates a catalog of goods based on the information extracted from an XML file.
XML File Age Check: Before updating the catalog, the script verifies if the XML file is older than three days.
Automatic Updates: If the XML file is outdated, the script automatically downloads a fresh version from the donor site to ensure the catalog's accuracy.
Customizable Configuration: The script allows for easy configuration of parameters such as the XML file location, update frequency, and donor site URL.
Error Handling: The script incorporates error handling mechanisms to provide informative messages in case of any issues encountered during the catalog generation or XML file update process.
Usage:

** Initial Setup: ** Configure the script by providing the XML file location, update frequency, and donor site URL.
Catalog Generation: Execute the script to create an initial catalog from the XML file.
Automatic Updates: The script will periodically check the age of the XML file and initiate a download from the donor site if it is older than three days.
Error Handling: In case of errors during the catalog generation or XML file update, refer to the error messages provided by the script for troubleshooting.
Dependencies:

PHP: Ensure that PHP is installed on your server or local environment to execute the script.
Internet Connectivity: The script requires an internet connection to download the XML file from the donor site.
By utilizing the XML Catalog Updater script, you can effortlessly maintain an up-to-date catalog of goods by automatically updating it with the latest information from the XML file obtained from the donor site.