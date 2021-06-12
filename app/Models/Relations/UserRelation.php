<?php

namespace App\Models\Relations;

use App\Models\Application;
use App\Models\ApplicationProgram;
use App\Models\Centre;
use App\Models\Education;
use App\Models\Faculty;
use App\Models\Payment;
use App\Models\Representative;
use App\Models\Role;
use App\Models\Scholarship;
use App\Models\Student;
use App\Models\StudentAdditionalDoc;
use App\Models\StudentLanguageTest;
use App\Models\StudentReference;
use App\Models\SuperAdmin;
use App\Models\University;
use App\Models\Wishlist;

trait UserRelation
{


    //relation with role one to many relationship
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }


    //get superadmin
    public function superadmin()
    {
        return $this->hasOne(SuperAdmin::class, 'user_id', 'id');
    }








    //get centre
    public function centre()
    {
        return $this->hasOne(Centre::class, 'user_id', 'id');
    }











    //get university
    public function university()
    {
        return $this->hasOne(University::class, 'user_id', 'id');
    }

    //get faculties
    public function faculties()
    {
        return $this->hasMany(Faculty::class, 'university_id', 'id');
    }

    //get scholarships
    public function scholarships()
    {
        return $this->hasMany(Scholarship::class, 'university_id', 'id');
    }

    public function universitySubsribes()
    {
        return $this->hasMany(Wishlist::class, 'university_id', 'id');
    }

    //get universityRepresentatives
    public function universityRepresentatives()
    {
        return $this->hasMany(Representative::class, 'university_id', 'id');
    }

    //get university applications
    public function universityApplications()
    {
        return $this->hasMany(ApplicationProgram::class, 'university_id', 'id');
    }








    // ==========<representative roles start  >===============
    //get representative
    public function representative()
    {
        return $this->hasOne(Representative::class, 'user_id', 'id');
    }

    //get assignTasks
    public function assignTasks()
    {
        return $this->hasMany(ApplicationProgram::class, 'representative_id', 'id');
    }

    // ==========<representative roles end  >===============










    // ==========<student roles end  >===============
    //get student
    public function student()
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }
    //get student
    public function educations()
    {
        return $this->hasMany(Education::class, 'student_id', 'id');
    }
    //get student
    public function references()
    {
        return $this->hasMany(StudentReference::class, 'student_id', 'id');
    }
    //get student
    public function languageTests()
    {
        return $this->hasMany(StudentLanguageTest::class, 'student_id', 'id');
    }
    //get student
    public function aditionalDocs()
    {
        return $this->hasMany(StudentAdditionalDoc::class, 'student_id', 'id');
    }

    //get applications
    public function applications()
    {
        return $this->hasMany(Application::class, 'student_id', 'id');
    }

    // ==========<student roles end  >===============












    //get payments
    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }

    //get payments
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id', 'id');
    }
}
