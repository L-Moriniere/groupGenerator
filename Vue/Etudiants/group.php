<?php

$I_compteurGroupe = 1;


echo "<article class='container-fluid mb-5'>
        <section class='row justify-content-around p-5' >
           <h6 class='leftH6'>Groupes</h6>";

foreach ($A_vue['groups'] as $A_group) {

    echo "<section class='borderGroupe col-lg-3 col-md-4 col-sm-5  mt-3'>
            <h4 class='mt-2'>Groupe $I_compteurGroupe</h4>
            <section>
                <h6 class='text-white float-end'>card</h6>
                <hr>
";
    $I_compteurGroupe++;
    for ($i = 0; $i < $A_vue['nbMax']; $i++) {
        if (isset($A_group[$i]))
            echo "<p>" . $A_group[$i][1] . " " . $A_group[$i][2] . "</p>";
    }
    echo "
        </section>
     </section>

";
}

echo "

<footer>
<br>
    <p class='text-center'>Il y a <strong>" . count($A_vue['groups']) . "</strong> groupes</p>
    <br>
</footer>
</section>
</article>
";


