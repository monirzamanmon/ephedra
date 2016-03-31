function clearCells() {
	document.getElementById('candidateform').reset();
}

function editCells(id, candidateName,testScore,interviewScore,experienceScore) {
	document.getElementById('id').value = id;
	document.getElementById('candidateName').value = candidateName;
	document.getElementById('testScore').value = testScore;
	document.getElementById('interviewScore').value = interviewScore;
	document.getElementById('experienceScore').value = experienceScore;
}

function deleteCandidate(id) {
	if(confirm('Are you sure you want to delete this candidate data?')) {
		window.location.replace('../controllers/index.php?target=candidate&action=delete&param=' + id);
	}
}

function saveCandidate() {
	
	var messageText = "";
	var candidateName = "";
	var testScore = "";
	var interviewScore = "";
	var experienceScore = "";
	
	candidateName = document.getElementById('candidateName').value;

	//alert(candidateName.trim().length);
	
	if (candidateName.trim().length < 1) {
		messageText = messageText + '\nCandidate Name cannot be empty.';
	}

	//alert(messageText);
	
	testScore = document.getElementById('testScore').value;
	messageText = checkScore(testScore, messageText, 'Test');
	
	interviewScore = document.getElementById('interviewScore').value;
	messageText = checkScore(interviewScore, messageText, 'Interview');
	
	experienceScore = document.getElementById('experienceScore').value;
	messageText = checkScore(experienceScore, messageText, 'Experience');          
	
	if (messageText.length > 0) {
		messageText = 'The following inputs need your kind attention. \n\n' + 
		messageText + 
		'\n\nPlease correct the above issues and then try again. Thank you!\n\n';
		alert(messageText);
	} else {
		document.getElementById('candidateform').submit();
	}
}

function checkScore(score, messageText, scoreType) {
	var appendix = '\n' + scoreType + ' score must be a positive integer between 0 to 100.';
	if (!isNumeric(score)) {
		messageText = messageText + appendix;
	} else {
		numberValue = parseInt(score, 10);
		if (numberValue < 0 || numberValue > 100) {
			messageText = messageText  + appendix;
		}
	}
	return messageText;
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n); 
}