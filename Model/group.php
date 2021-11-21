<?php

final class Group
{

    public function printArray(array $groupes)
    {
       return $groupes;
    }


    public function getGroupe(int $I_nbMax): array
    {

        $A_listeEtu = array();


        if (isset($_POST['submit']))
        {
            //ressource type
            $R_handle = fopen($_FILES['fileEtu']['tmp_name'], "r");
            $S_headers = fgetcsv($R_handle, 1000, ",");

            while (($A_data = fgetcsv($R_handle, 1000, ",")) !== FALSE)
            {
                array_push($A_listeEtu, $A_data);
            }
            fclose($R_handle);
        }

        for ($i = 1; $i <= 2; $i++) {
            array_shift($A_listeEtu);
        }

        shuffle($A_listeEtu);

        $A_groupes = array_chunk($A_listeEtu, $I_nbMax);
        $A_groupes = $this->equilibrate($A_groupes, $I_nbMax);



        return $A_groupes;

    }

    public function equilibrate(array $A_groupes, int $I_nbMax): array
    {
        $I_nbGroupe = count($A_groupes)-1;


        if (count($A_groupes[$I_nbGroupe]) == $I_nbMax || count($A_groupes[$I_nbGroupe-1]) <= $I_nbMax-1 || count($A_groupes[$I_nbGroupe]) == $I_nbMax-1)
        {
            return $A_groupes;
        }
        else{
            while (count($A_groupes[$I_nbGroupe]) < count($A_groupes[$I_nbGroupe-1]))
            {
                $last = array_pop($A_groupes[$I_nbGroupe-1]);
                array_push($A_groupes[$I_nbGroupe], $last);
                $this->equilibrate($A_groupes, $I_nbMax);
            }
            return $A_groupes;
        }

    }



}