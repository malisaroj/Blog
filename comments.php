<?php
$commenter = wp_get_current_commenter();
$fields =  array(
    'author' => '<div class="col-sm-6">
    <div class="form-group">
        <input class="form-control" name="author" id="author" type="text" placeholder="Name" value="' . esc_attr($commenter['comment_author']) . '">
    </div>
</div>',

    'email'  => ' <div class="col-sm-6">
    <div class="form-group">
        <input class="form-control" name="email" id="email" type="email" placeholder="Email" value="' . esc_attr($commenter['comment_author_email']) . '" >
    </div>
</div>',
    'url'  => ' <div class="col-12">
    <div class="form-group">
        <input class="form-control" name="url" id="url" type="text" placeholder="Website"  value="' . esc_attr($commenter['comment_author_url']) . '" >
    </div>
</div></div>',
);

$comments_args = array(
    'fields' =>  $fields,
    'label_submit' => 'Send Message',
    'title_reply' => '',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'id_form' => 'commentForm',
    'class_form' => 'form-contact comment_form',

    //'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
    'comment_field' => '<div class="row"><div class="col-12">
<div class="form-group">
    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
</div>
</div>'


);

comment_form($comments_args);
