<?php
/* @var $this SiteController */
/* @var $data Array */
?>

<div class="view">
    <h2><?=$poly->AC_NAME?> Assembly Constituency - #<?=$data->acno?></h2>

    <?php
    $this->widget ( 'zii.widgets.CDetailView', 
            array (
                    'data' => $data,
                    'attributes' => array (
                            array ( // related city displayed as a link
                                    'label' => 'Elected MLA Name',
                                    'name' => 'name' 
                            ),
                            'party',
                    ) 
            ) );    
    
    ?>

</div>