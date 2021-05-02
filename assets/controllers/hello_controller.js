import { Controller } from 'stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */

/*export default class extends Controller {
    connect() {
        this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
    }


}
*/

var $addButton = $('<a href="#" class="add_tag_link btn btn-info">Add a Address</a>');
var $newLinkL = $('<li></li>').append($addButton);

jQuery(document).ready(function() {
   var $collectionHolder = $('ul.tags');
    
    $collectionHolder.append($newLinkL);
    
    $collectionHolder.data('index', $collectionHolder.find(':input').length);
    
    $addButton.on('click', function(e) {
        e.preventDefault();
        
        addTagForm($collectionHolder, $newLinkL);
    });
    
    
});

function addTagForm($collectionHolder, $newLinkL) {
    var prototype = $collectionHolder.data('prototype');
    
    var index = $collectionHolder.data('index');
    
    var newForm = prototype.replace(/__name__/g, index);
    
    $collectionHolder.data('index', index + 1);
    
    var $newFormLi = $('<li></li>').append(newForm);
    
    $newFormLi.append('<a href="#" class="remove-tag btn btn-danger	">Remove</a>');
    
    $newLinkL.before($newFormLi);
    
    $('.remove-tag').click(function(e) {
        e.preventDefault();
        
        $(this).parent().remove();
        
        return false;
    });
}
