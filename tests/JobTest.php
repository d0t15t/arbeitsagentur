<?php

use PHPUnit\Framework\TestCase;
use kzorluoglu\Arbeitsagentur\Service\JobService;
use kzorluoglu\Arbeitsagentur\Job;
use kzorluoglu\Arbeitsagentur\XMLJob;

class JobTest extends TestCase
{
    private $jobService;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function getJob()
    {
        $job = new Job();
        $job->SupplierId = 'A000000000';
        $job->Timestamp = new \DateTime('now');
        $job->Amount = '1';
        $job->TypeOfLoad = '1';
        $job->JobPositionPostingId = '1';
        $job->StartDate = new \DateTime('now');
        $job->EndDate = new \DateTime('now');
        $job->Status = '1';
        $job->SupplierName = '1';
        $job->SupplierIndustrie = '1';
        $JobPositionTitle = $job->JobPositionTitle = new stdClass();
        $JobPositionTitle->TitleCode = '1';
        $JobPositionTitle->Degree = '1';

        $AlternativeJobPositionTitle = $job->AlternativeJobPositionTitle = new stdClass();
        $AlternativeJobPositionTitle->TitleCode = '1';
        $AlternativeJobPositionTitle->Degree = '1';

        $job->JobPositionTitleDescription = '1';
        $job->JobOfferType = '1';
        $job->SocialInsurance = '1';
        $job->CountryCode = '1';
        $job->PostalCode = '1';
        $job->Region = '1';
        $job->AddressLine = '1';
        $job->StreetName = '1';
        $job->Leadership = '1';
        $job->MiniJob = '1';
        $job->TermLength = '1';
        $job->TermDate = new \DateTime('now');
        $job->ApplicationStartDate = new \DateTime('now');
        $job->ApplicationEndDate = new \DateTime('now');
        $job->TemporaryOrRegular = '1';
        $job->Salary = '1';

        $EducationQualifs = $job->EducationQualifs = new stdClass();
        $EducationQualifs->EduDegree = '1';
        $EducationQualifs->EduDegreeRequired = '1';

        $ManagementQualifs = $job->ManagementQualifs = new stdClass();
        $ManagementQualifs->LeadershipType = '1';
        $ManagementQualifs->Authority = '1';
        $ManagementQualifs->LeadershipEx = '1';
        $ManagementQualifs->BudgetResp = '1';
        $ManagementQualifs->EmployeeResp = '1';

        $Language = $job->Language = new stdClass();
        $Language->LanguageName = '1';
        $Language->LanguageLevel = '1';

        $HardSkill = $job->HardSkill = new stdClass();
        $HardSkill->SkillName = '1';
        $HardSkill->SkillLevel = '1';

        $SoftSkill = $job->SoftSkill = new stdClass();
        $SoftSkill->SkillName = '1';
        $SoftSkill->SkillLevel = '1';

        $job->DrivingLicence = '1';
        $job->DrivingLicenceRequired = '1';
        $job->TravelRequired = '1';
        $job->NumberToFill = '1';
        $job->AssignmentStartDate = new \DateTime();
        $job->AssignmentEndDate = new \DateTime();

        return $job;
    }



    public function testExportXML()
    {
        $xmlJob = new XMLJob($this->getJob());
        $this->jobService = new JobService($xmlJob);
        $jobs = $this->jobService->generate();
        $generatedXMLFile = $xmlJob->getXML();

        $this->assertSame($jobs->getAll(), $generatedXMLFile);
    }

    public function testXMLJobPrepare()
    {
        $xmlJob = new XMLJob($this->getJob());
        $this->jobService = new JobService($xmlJob);
        $this->assertTrue($this->jobService->isValidRequest());
    }


}
