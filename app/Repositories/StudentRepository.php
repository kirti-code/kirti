<?php

namespace App\Repositories;
use App\Product;
use App\College;



class StudentRepository
{
    //function to store student data
    public function storeProduct($request){
        $insert=Student::create($request->all());
        return $insert;
    }
    //end of function

    //function to get student data
    public function getStudentsData($id="") {
        if($id){
            return Student::findorfail($id);
        }
        else{
           return Student::all();
        }
      } 
    //end of get function

    //delete function
      public function deleteStudent($id){
        $student= $this->getStudentsData($id);
        $student->delete();
      }
    //end function

    
    //function to get college data
         public function getCollegeData() {
        
           return College::all();
        
      } 
      //end of get function

}
