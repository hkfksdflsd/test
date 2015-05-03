function forms($form = NULL, $option = NULL, $more = array(1), $value = NULL) {
 global $style;
 
 $forms = array(
    'elements'=>array(
        'create_album'=>array(
            'type'=>'multipart',
            'elements'=>array(
                'name'=>array(
                'title'=>'Название альбома',
                'type'=>'text',
                'value'=>$value[0],
                ),
                'update_group'=>array(
                'title'=>'Закрытый альбом',
                'type'=>'checkbox',
                'value'=>'1',
                ),
                'mygroup'=>array(
                    'type'=>'hidden',
                    'value'=>$value[1],
                ),
                'act'=>array(
                    'type'=>'hidden',
                    'value'=>'1',
                )
            ),
        ),
                'create_group'=>array(
            'type'=>'multipart',
            'elements'=>array(
                'name'=>array(
                'title'=>'Название группы',
                'type'=>'text',
                'value'=>$value[0],
                ),
                'dis'=>array(
                'title'=>'Описание группы',
                'type'=>'text',
                'value'=>$value[0],
                ),
                'act'=>array(
                    'type'=>'hidden',
                    'value'=>'1',
                )
            ),
        ),
        'redact_file'=>array(
            'type'=>'form',
            'elements'=>array(
            'artist'=>array(
            'more'=>$more[0],
                'title'=>'Исполнитель',
                'type'=>'text',
                'size'=>'30',
                'value'=>$value[0],
                ),
                'name'=>array(
                'title'=>'Название файла',
                'type'=>'text',
                'maxlength'=>'100',
                'size'=>'30',
                'value'=>$value[1],
                ),
                'filedis'=>array(
                'title'=>'Описание файла',
                'type'=>'text',
                'maxlength'=>'300',
                'size'=>'30',
                'value'=>$value[2],
                ),
                'update_group'=>array(
                'title'=>'Применить к группам',
                'type'=>'checkbox',
                'value'=>'1',
                ),
                'fid'=>array(
                    'type'=>'hidden',
                    'value'=>$value[3],
                ),
                'act_redact'=>array(
                    'type'=>'hidden',
                    'value'=>'1',
                ),
                    'mygroup'=>array(
                    'type'=>'hidden',
                    'value'=>$value[4],
                )
            ),
        ),
    ),
 
    'buttons'=>array(
        'create_album'=>array(
            'type'=>'submit',
            'label'=>'Создать альбом',
            'label2'=>'Внести изменения',
        ),
                'create_group'=>array(
            'type'=>'submit',
            'label'=>'Создать группу',
            'label2'=>'Внести изменения',
        ),
        'redact_file'=>array(
            'type'=>'submit',
            'label'=>'Внести изменения',
        ),
    ),
);

if($forms["elements"][$form]["type"] == "multipart")
$form_type = 'enctype="multipart/form-data"';
else
$form_type = NULL;
$form_start = '<form action="" '.$form_type.' method="post">';

$echo = NULL;
foreach($forms["elements"][$form]["elements"] as $key => $value){
if($value["type"] == "hidden")
$echo .= '<input type="hidden"  name="'.$key.'" value="'.$value["value"].'"/>';
elseif($value["type"] == "select"){
$echo .= '<select name="">';
foreach($forms["elements"][$form]["elements"]["select"] as $key => $value){
$echo .= '<option value=""></option>';
}
$echo .= '</select>';
}elseif($value["type"] == "checkbox"){
$echo .= '<input type="'.$value["type"].'" name="'.$key.'" value="'.$value["value"].'"/> '.$value["title"];
}else{
    if(empty($value["more"])){
    if(isset($value["title"]))
$echo .= $style->forms_text.$value["title"].$style->div;
$echo .= '<input type="'.$value["type"].'" name="'.$key.'" value="'.$value["value"].'"' . $style->forms . '/>';
}
}
}
$submit = '<input type="'.$forms["buttons"][$form]["type"].'" name="submit" value="'.$forms["buttons"][$form]["label"].'"' . $style->forms_bottom . '>';
$form_end = '</form>';

echo $style->forms_block.$form_start.$echo.$submit.$form_end.$style->div;

}
