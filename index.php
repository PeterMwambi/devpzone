<?php
/**
 * Root to app folders and files
 * Deny all access to root folders structure
 * with 404 request
 * 
 * devpzone.com/app redirects user to root index file
 *  
 * @author Peter Mwambi
 * @abstract Restrict access to app directory structure 
 */
http_response_code(404);
die(header("location:/"));