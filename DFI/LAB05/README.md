Step 1: Set Up a Virtual Environment
1)Open your terminal or command prompt.
2)Create a new directory for your project (if not already created) and navigate to it:
mkdir email-header-analysis
cd email-header-analysis
3)Create a virtual environment named env using the following command:
python -m venv env
here env is the name of the virtual environment. You can use any name you want.
4)Activate the virtual environment using the following command:
env\Scripts\activate
5)Install the required packages using the following command:

Step 2: Clone the Repository
1)Clone the repository using the following command:
git clone #link
2)Navigate to the cloned repository:
cd email-header-analysis

Step 3: Install Required Packages
Install the required packages using the following command:
pip install -r requirements.txt

Step 4: Configure Gmail for IMAP
1)Log in to your Gmail account.

2)Click on the gear icon in the upper-right corner and select "See all settings."

3)Go to the "Forwarding and POP/IMAP" tab.

4)In the "IMAP Access" section, ensure that "Enable IMAP" is selected.

5)Save your changes.

step 5: Create a config.yml File
1)Create a new file named config.yml in the root directory of your project.
configure the following settings in the config.yml file:
email: your-email@gmail.com
password: your-password


Step 6: Generate an App Password (If Two-Factor Authentication Is Enabled)
If you have Two-Factor Authentication (2FA) enabled for your Gmail account, you will need to generate an "App Password" to use in your Python code. Here's how to do it:

1)Go to your Google Account settings: https://myaccount.google.com/.

2)Click on "Security" on the left sidebar.

3)Under the "Signing in to Google" section, click on "App passwords."

4)In the "App passwords" section, select "Mail" for the app and "Other (Custom Name)" for the device.

5)Click "Generate."

6)Google will generate an App Password for you. Copy it and use it as your Gmail password in your config.yml file for the assignment.

step 7: Run the Script

if you have any problem in running the script then you can contact me on my email id: jadhavjitendra3207@gmail.com
