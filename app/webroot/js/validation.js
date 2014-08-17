// onsubmit="return validateForm(this)"
// OK so here is the validate form method.
// It won't do much itself just pass certain fields to the correct methods.
function validateForm(form, type) { 
// If account to is venue, validate venue details.
if (type == 'venue') {
// Validate venue information.
if (validateTypeName(form.venuename)) {
if (validatePostcode(form.venuelocation)) {
if (validateVenueCapacity(form.venuecapacity)) {
// Check Contact Information.
if (validateName(form.contactname)) {
if (validateName(form.contactsurname)) {
if (validatePostcode(form.contactpostcode)) {
if (validatePhoneNumber(form.contactphone)) {
if (validateEmail(form.contactemail)) {
// Check User Information.
if (validateUsername(form.username)) {
if (validateEmail(form.email)) {
if (validatePassword(form.password, form.username)) {
if (validateConfirmPassword(form.passwordconfirm, form.password)) 
  return true;
else
  return false;
}
else
  return false;
}
else
  return false;    
}  
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
// If account to is venue, validate venue details.
else if (type == 'artist') {
// Validate venue information.
if (validateTypeName(form.artistname)) {
if (validatePostcode(form.artistlocation)) {
if (validateArtistGenre(form.artistgenre)) {
if (validateArtistBio(form.artistbio)) {
// Check Contact Information.
if (validateName(form.contactname)) {
if (validateName(form.contactsurname)) {
if (validatePostcode(form.contactpostcode)) {
if (validatePhoneNumber(form.contactphone)) {
if (validateEmail(form.contactemail)) {
// Check User Information.
if (validateUsername(form.username)) {
if (validateEmail(form.email)) {
if (validatePassword(form.password, form.username)) {
if (validateConfirmPassword(form.passwordconfirm, form.password)) 
  return true;
else
  return false;
}
else
  return false;
}
else
  return false;    
}  
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
else
  return false;
}
}

function validateSearchForm(form) {
  // Check User Information.
  if (validateSearch(form.query))
    return true;     
  else
    return false;
}

function validatePostForm(form) {
  // Check User Information.
  if (validatePost(form.postText))
    return true;
  else
    return false;
}

function validateCommentForm(form) {
  // Check User Information.
  if (validatePost(form.comment))
    return true;
  else
    return false;
}

function validatePost(fld) {
  if (fld.value.length == 0) {
    inlineMsg(fld.id,'You must enter a message.',5);
    return false;
  } // if
  else if (fld.value.match(/(<([^>]+)>)/ig)) {
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // else if
  return true;
} // validateSearch


// Validate Venue name.
// Must not be empty and must not contain my than 30 characters.
function validateTypeName(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(0, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    showStep(0, true);
    inlineMsg(fld.id,'You must enter a name.',5);
    return false;
  } // else if
  else if (fld.value.length > 30) {
    showStep(0, true);
    inlineMsg(fld.id,'Your name is too long. It must be at most 30 characters long.',5);
    return false;
  } // else if
  return true;
} // validateVenueName

// Validate the location of the venue.
function validateTypeLocation(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(0, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    showStep(0, true);
    inlineMsg(fld.id,'You must enter your location.',5);
    return false;
  } // else if
  else if (!fld.value.match(/^[a-zA-Z]+$/)) {
    showStep(0, true);
    inlineMsg(fld.id,'Your location is not valid. It must contain only letters',5);
    return false;
  } // else if
  return true;
} // validateCapacity

// Validate the capacity.
// Cannot be larger than 10 digits.
function validateVenueCapacity(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(0, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    showStep(0, true);
    inlineMsg(fld.id,'You must enter a capacity for your venue.',5);
    return false;
  } // else if
  else if (!fld.value.match(/^\d+$/)) {
    showStep(0, true);
    inlineMsg(fld.id,'The capacity you have entered is not valid.'
                     + ' It must contain digits only.',5);
    return false;
  } // else if
  return true;
} // validateCapacity

// Validate the genre of the artist.
// Must contain letters only and be at most 20 characters long.
function validateArtistGenre(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(0, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    showStep(0, true);
    inlineMsg(fld.id,'You must enter your genre.',5);
    return false;
  } // else if
  else if (!fld.value.match(/^[a-zA-Z]+$/)) {
    showStep(0, true);
    inlineMsg(fld.id,'Your genre is not valid. It must contain only letters.',5);
    return false;
  } // else if
  return true;
} // validateArtistGenre

function validateArtistNoOfMembers(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(0, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (!fld.value.match(/^\d{1,15}$/)) {
    showStep(0, true);
    inlineMsg(fld.id,'You must enter the number of members in your band.',5);
    return false;
  } // else if
  return true;
} // validateArtistNoOfMembers

// Validate the bio.
// At the moment it only limits the amount you can type.
function validateArtistBio(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(0, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length > 1000) {
    showStep(0, true);
    inlineMsg(fld.id,'Your bio is too long.',5);
    return false;
  } // else if
  return true;
} // validateArtistBio

// Validate the name/surname.
// Too much variation in names, so I just limited the size and added the hack check.
function validateName(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(1, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    showStep(1, true);
    inlineMsg(fld.id,'You must enter a name.',5);
    return false;
  } // else if
  else if (fld.value.length > 25) {
    showStep(1, true);
    inlineMsg(fld.id,'Your name is too long.',5);
    return false; 
  } // else if
  return true;
} // validateName  

// Validate postcode (Currently UK only?)
function validatePostcode(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(1, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    showStep(1, true);
    inlineMsg(fld.id,'You must enter a postcode.',5);
    return false;
  } // else if  
  else if (!fld.value.match(/^([a-zA-Z]){1}([0-9][0-9]|[0-9]|[a-zA-Z][0-9][a-zA-Z]|[a-zA-Z][0-9][0-9]|[a-zA-Z][0-9]){1}([ ])([0-9][a-zA-z][a-zA-z]){1}$/)) {
    showStep(1, true);
    inlineMsg(fld.id,'You must enter a valid postcode.',5);
    return false;
  } // else if
  return true;
} // validatePostcode

// Validate phone number.
// Large variation so only limits it to digits and a certain length.
function validatePhoneNumber(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    showStep(1, true);
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (!fld.value.match(/^\d{1,15}$/)) {
    showStep(1, true);
    inlineMsg(fld.id,'Please enter a phone number.',5);
    return false;
  } // else if
  return true;
} // validatePhoneNumber

// Check the username is valid.
function validateUsername(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    inlineMsg(fld.id,'You must enter a username.',5);
    return false;
  } // else if
  else if (!fld.value.match(/^[A-Za-z0-9_]{3,25}$/)) {
    inlineMsg(fld.id,'Your username is invalid. It must be atleast 3'
                      + ' characters long and only contain letters,'
                      + ' numbers and underscores.',5);
    return false;
  } // else if
  return true;
} //  validateUsername

// Check the email is valid.
// Must include '@' and no illegal symbols.
function validateEmail(fld) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    inlineMsg(fld.id,'You must enter an email.',5);
    return false;
  } // else if
  else if (!fld.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
    inlineMsg(fld.id,'Your email is not valid.',5);
    return false;
  } // else if
  return true;
} // validateEmail

// Check that the password is valid.
// Contains atleast 1 number, 1 uppercase character and be atleast
// 6 characters long.
function validatePassword(fld, fld2) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    inlineMsg(fld.id,'You must enter a password.',5);
    return false;
  } // else if
  else if (fld.value == fld2.value) {
    inlineMsg(fld.id,'Your password cannot be the same as your username.');
    return false;
  } // else if 
  else if (!fld.value.match(/(?=.*\d)(?=.*[A-Z]).{6,25}$/)) {
    inlineMsg(fld.id,'Your password is invalid, it must contain atleast 6'
                      + ' characters, 1 number and 1 uppercase character.',5);
    return false;
  } // else if
  return true;
} // validatePassword

// Compares the two passwords.
function validateConfirmPassword(fld, fld2) {
  if (fld.value.match(/(<([^>]+)>)/ig)) {
    inlineMsg(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // if
  else if (fld.value.length == 0) {
    inlineMsg(fld.id,'You must confirm your password.',5);
    return false;
  } // else if 
  else if (fld.value != fld2.value) {
    inlineMsg(fld.id,'Your passwords do not match.',5);
    return false;
  } // else if 
  return true;
} // validateConfirmPassword

function validateSearch(fld) {
  if (fld.value.length == 0) {
    inlineMsgUnder(fld.id,'You must enter a query into the search field.',5);
    return false;
  } // if
  else if (fld.value.length < 2) {
    inlineMsgUnder(fld.id,'The search query cannot be shorter than 2 characters',5);
    return false;
  } // else if
  else if (fld.value.match(/(<([^>]+)>)/ig)) {
    inlineMsgUnder(fld.id,'Naughty, naughty! What are u trying to do??',5);
    return false;
  } // else if
  return true;
} // validateSearch

// START OF MESSAGE SCRIPT //
var MSGTIMER = 20;
var MSGSPEED = 5;
var MSGOFFSET = 3;
var MSGHIDE = 3;

// build out the divs, set attributes and call the fade function //
function inlineMsg(target,string,autohide) {
  var msg;
  var msgcontent;
  if(!document.getElementById('msg')) {
    msg = document.createElement('div');
    msg.id = 'msg';
    msgcontent = document.createElement('div');
    msgcontent.id = 'msgcontent';
    document.body.appendChild(msg);
    msg.appendChild(msgcontent);
    msg.style.filter = 'alpha(opacity=0)';
    msg.style.opacity = 0;
    msg.alpha = 0;
  } else {
    msg = document.getElementById('msg');
    msgcontent = document.getElementById('msgcontent');
  }
  msgcontent.innerHTML = string;
  msg.style.display = 'block';
  var msgheight = msg.offsetHeight;
  var targetdiv = document.getElementById(target);
  targetdiv.focus();
  var targetheight = targetdiv.offsetHeight;
  var targetwidth = targetdiv.offsetWidth;
  var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
  var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
  msg.style.top = topposition + 'px';
  msg.style.left = leftposition + 'px';
  clearInterval(msg.timer);
  msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
  if(!autohide) {
    autohide = MSGHIDE;  
  }
  window.setTimeout("hideMsg()", (autohide * 1000));
}

function inlineMsgUnder(target,string,autohide) {
  var msg;
  var msgcontent;
  if(!document.getElementById('msg')) {
    msg = document.createElement('div');
    msg.id = 'msg';
    msgcontent = document.createElement('div');
    msgcontent.id = 'msgcontent';
    document.body.appendChild(msg);
    msg.appendChild(msgcontent);
    msg.style.filter = 'alpha(opacity=0)';
    msg.style.opacity = 0;
    msg.alpha = 0;
  } else {
    msg = document.getElementById('msg');
    msgcontent = document.getElementById('msgcontent');
  }
  msgcontent.innerHTML = string;
  msg.style.display = 'block';
  var msgheight = msg.offsetHeight;
  var targetdiv = document.getElementById(target);
  targetdiv.focus();
  var targetheight = targetdiv.offsetHeight;
  var targetwidth = targetdiv.offsetWidth;
  var topposition = topPosition(targetdiv) + targetheight + 2;
  var leftposition = leftPosition(targetdiv) + MSGOFFSET;
  msg.style.top = topposition + 'px';
  msg.style.left = leftposition + 'px';
  clearInterval(msg.timer);
  msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
  if(!autohide) {
    autohide = MSGHIDE;  
  }
  window.setTimeout("hideMsg()", (autohide * 1000));
}

// hide the form alert //
function hideMsg(msg) {
  var msg = document.getElementById('msg');
  if(!msg.timer) {
    msg.timer = setInterval("fadeMsg(0)", MSGTIMER);
  }
}

// face the message box //
function fadeMsg(flag) {
  if(flag == null) {
    flag = 1;
  }
  var msg = document.getElementById('msg');
  var value;
  if(flag == 1) {
    value = msg.alpha + MSGSPEED;
  } else {
    value = msg.alpha - MSGSPEED;
  }
  msg.alpha = value;
  msg.style.opacity = (value / 100);
  msg.style.filter = 'alpha(opacity=' + value + ')';
  if(value >= 99) {
    clearInterval(msg.timer);
    msg.timer = null;
  } else if(value <= 1) {
    msg.style.display = "none";
    clearInterval(msg.timer);
  }
}

// calculate the position of the element in relation to the left of the browser //
function leftPosition(target) {
  var left = 0;
  if(target.offsetParent) {
    while(1) {
      left += target.offsetLeft;
      if(!target.offsetParent) {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.x) {
    left += target.x;
  }
  return left;
}

// calculate the position of the element in relation to the top of the browser window //
function topPosition(target) {
  var top = 0;
  if(target.offsetParent) {
    while(1) {
      top += target.offsetTop;
      if(!target.offsetParent) {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.y) {
    top += target.y;
  }
  return top;
}

// preload the arrow //
arrow = new Image(7,80); 
arrow.src = "../../img/msg_arrow.gif"; 

$('#bandMemb').hide();

$('.aType').change(function() {
    if($(this).val() != 'Band') {
        $('#bandMemb').hide();
        showStep(0, true);
    } 
    else {
        $('#bandMemb').show();
        showStep(0, true);
    }       
});
