# Arbeitsagentur API SDK
*unoffical* SDK Library of HR BA XML API in Job to create/delete Jobs and another actions. 

## Requirements
 - PHP 7.2 or higher

### How to Use
create Job Class with your Information
```
use kzorluoglu\Arbeitsagentur\Job;

$xmlJob = new Job();
        $xmlJob->setFileFullPath(__DIR__.'\\unittest.xml');

        $xmlJob->SupplierId = 'A000000000';
        $xmlJob->Timestamp = new \DateTime('now');
        $xmlJob->Amount = '1';
        $xmlJob->TypeOfLoad = '1';
        $xmlJob->JobPositionPostingId = '1';
        $xmlJob->StartDate = new \DateTime('now');
        $xmlJob->EndDate = new \DateTime('now');
        $xmlJob->Status = '1';
        $xmlJob->SupplierName = '1';
        $xmlJob->SupplierIndustrie = '1';
        $xmlJobPositionTitle = $xmlJob->JobPositionTitle = new stdClass();
        $xmlJobPositionTitle->TitleCode = '1';
        $xmlJobPositionTitle->Degree = '1';

        $AlternativeJobPositionTitle = $xmlJob->AlternativeJobPositionTitle = new stdClass();
        $AlternativeJobPositionTitle->TitleCode = '1';
        $AlternativeJobPositionTitle->Degree = '1';

        $xmlJob->JobPositionTitleDescription = '1';
        $xmlJob->JobOfferType = '1';
        $xmlJob->SocialInsurance = '1';
        $xmlJob->CountryCode = '1';
        $xmlJob->PostalCode = '1';
        $xmlJob->Region = '1';
        $xmlJob->AddressLine = '1';
        $xmlJob->StreetName = '1';
        $xmlJob->Leadership = '1';
        $xmlJob->MiniJob = '1';
        $xmlJob->TermLength = '1';
        $xmlJob->TermDate = new \DateTime('now');
        $xmlJob->ApplicationStartDate = new \DateTime('now');
        $xmlJob->ApplicationEndDate = new \DateTime('now');
        $xmlJob->TemporaryOrRegular = '1';
        $xmlJob->Salary = '1';

        $EducationQualifs = $xmlJob->EducationQualifs = new stdClass();
        $EducationQualifs->EduDegree = '1';
        $EducationQualifs->EduDegreeRequired = '1';

        $ManagementQualifs = $xmlJob->ManagementQualifs = new stdClass();
        $ManagementQualifs->LeadershipType = '1';
        $ManagementQualifs->Authority = '1';
        $ManagementQualifs->LeadershipEx = '1';
        $ManagementQualifs->BudgetResp = '1';
        $ManagementQualifs->EmployeeResp = '1';

        $Language = $xmlJob->Language = new stdClass();
        $Language->LanguageName = '1';
        $Language->LanguageLevel = '1';

        $HardSkill = $xmlJob->HardSkill = new stdClass();
        $HardSkill->SkillName = '1';
        $HardSkill->SkillLevel = '1';

        $SoftSkill = $xmlJob->SoftSkill = new stdClass();
        $SoftSkill->SkillName = '1';
        $SoftSkill->SkillLevel = '1';

        $xmlJob->DrivingLicence = '1';
        $xmlJob->DrivingLicenceRequired = '1';
        $xmlJob->TravelRequired = '1';
        $xmlJob->NumberToFill = '1';
        $xmlJob->AssignmentStartDate = new \DateTime();
        $xmlJob->AssignmentEndDate = new \DateTime();
```
and create JobService for XMLJOB

```
    $xmlJob = new XMLJob($xmlJob);
    $jobService = new JobService($xmlJob);
    // output for XML File
    $jobs = $jobService->generate();
    //OPTIONAL View generated XML 
    $xmlJob->getXML();
    // Prepare for Upload
     $jobService->setCompany(new Company());
    if($jobService->isValid()){
        $jobService->upload();
    }

```
 
## Installation

### Composer
```
composer require kzorluoglu/arbeitsagentur
```

### TODO
- XMLJob
    - Dynamic Filename with Arbeitsagentur Format  (ABCCCCCCCCCC_DDDD-DD-DD_DD-DD-DD_ESSSS.HHH) 
    ![Alt text](todo/XMLFileName.png?raw=true "Title")
- JobService Class
    - Upload Method Implementing, like setRemote(RemoteInterface $remote)->upload()
        - ```
          curl --cert Zertifikat-<id>.pem[:pem_passwort] -F upload=@<Pfad_zur_Datei>\DS<Partnernummer>_<Zeitstempel>.XML https://hrbaxml.arbeitsagentur.de/in/upload.php
        ```
     - setRemote(new Arbeitsagentur)
     - upload()

-   RemoteInterface
    - ....
-   Arbeitsagentur implements RemoteInterface Class 
    - setCertificate($filePathFromCertificate)
    - getCertificate()
    - getSupplierID()
    - getAllianzpartnernummer()
    - getArbeitgebernummer()
    - getPIN()

### Tests
Create your test under *tests* folder, and run phpunit.
```
./vendor/bin/phpunit
```