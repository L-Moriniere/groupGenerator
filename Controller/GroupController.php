<?php

require_once ('./Model/group.php');

final class GroupController
{
    public function defaultAction()
    {

        $O_group = new Group();

        if(isset($_POST['nbMax']))
            $nbMax = $_POST['nbMax'];
        else $nbMax = 1;

        $A_groupes = $O_group->getGroupe($nbMax);


        Vue::show('Etudiants/group', array('groups' => $O_group->printArray($A_groupes),
                                                        'nbMax'=> $nbMax));
    }


}