<!-- Programmer Name: Tay Wei Qin
Program Name: FAQ.php
Description: Frequently Ask Questions Page
First Written On: Sunday, 18-June-2023
Last Edited On: Wednesday, 5-July-2023 -->
<?php
    include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/EduAdvisor.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<link rel="stylesheet" href="FAQ.css" />
<style>
      /* width */
::-webkit-scrollbar {
  width: 8px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

body {
        width: 100%;
        height: 100%;
    }
</style>
</head>
<body>

<div class="container">
    <h1 style="text-align:center;">Help Centre</h1>
    <h4 style="text-align:center;margin:30px;margin-bottom:80px;">Who is EduAdvisor and what do we do? All your frequently asked questions — answered.</h4>
  <h2>Frequently Asked Questions</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">How do I create an account in the application system?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>To create an account, click on the "Sign Up" or "Register" button on the system's homepage. Fill in the required information, such as your name, email address, and password, and follow the instructions to complete the registration process.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">What documents do I need to prepare for the application process?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>The required documents may vary depending on the university and program you are applying to. Typically, you will need academic transcripts, letters of recommendation, personal statement or essay, standardized test scores (if applicable), and any additional documents specified by the university or program.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Can I apply to multiple universities through this system?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Yes, the centralized application system allows you to apply to multiple universities and programs within the system. You can select the universities and programs you are interested in during the application process.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">How do I submit my application?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>After completing the application form and uploading the required documents, review your application for accuracy. Once you are satisfied, submit the application electronically through the system by following the designated submission process.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">Are there any hidden fees or charges?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>No, EduAdvisor services are 100% free for students and parents. We sustain our business by partnering with colleges and universities. For every successful application we submit to a partner institution, EduAdvisor earns a small fee, which allows us to continue offering free services to students.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">How can I track the status of my application?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>The system will provide the application portal on the user profile page where you can track the status of your application. You can log in to your account to view updates, such as whether your application is under review, if any additional information is required, or when a decision has been made.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">Can I make changes to my submitted application?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>In most cases, you cannot make changes to a submitted application. It is crucial to review your application thoroughly before submitting it. However, if you encounter any critical errors or need to update specific information, you should contact the university's admissions office directly for guidance.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">How do I contact the support team if I have questions or need assistance?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>The centralized application system has typically provide contact information for our support team on 'Contact Us' page, such as a phone number or email address. You can reach out to them with any questions or issues you may have during the application process, and they will be available to assist you.</p>
      </div>
    </div>
  </div>
</div>
<script>
    const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
</body>

<?php
  include "footer.php";
?>
</html>