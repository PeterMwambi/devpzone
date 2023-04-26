<?php

/**
 * @author Peter Mwambi
 * @abstract Redirect user to home page
 * Check Ip address verify aganist bots check URL param
 * If URL contains invalid url link such as link to database deny URL access 
 * redirect to homepage 
 */
header("location:app/pages/client/?request=home");
