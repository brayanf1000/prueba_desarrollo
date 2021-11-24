add_action('um_submit_form_errors_hook_','um_custom_validate_form', 999, 1);
function um_custom_validate_form( $args ) {

   global $ultimatemember;

   $user_email = $args['user_email'];

   extract($args);

   // Store allowed domains in an array
   $allowed_domains = ['@gmail.com', '@unisono.es', '@grupounisono.es', '@evoluciona.es'];

   // Set flag to false (fail-safe)
   $check = false;

   // Iterate through all allowed domains
   foreach( $allowed_domains as $domain ) {

       // If a match is found (remember to use lowercase emails!)
       // Update flag and break out of for loop
       if ( strpos( strtolower( $user_email ), $domain ) !== false ) {
           $check = true;
           break;
       }
   }

   if ( !$check ){
       $ultimatemember->classes['form']->add_error( 'user_email', 'Debes acceder con tu cuenta teletrabajo de campaña o Corporativa.');

   }
       
}