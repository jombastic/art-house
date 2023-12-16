# Application Documentation

## Overview

This application is a web-based activity tracker that allows users to manage and track their activities. It provides features such as filtering activities by date, viewing and editing activity details, and deleting activities. The application also generates reports that display the total time spent on activities.

It is built with the Laravel framework and uses Livewire to create a seamless single-page application-like experience.

## Installation

1. Copy the .env.example file to .env:
   ```
   cp .env.example .env
   ```
   Set up the database connection and email host in the .env file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   MAIL_MAILER=smtp
   MAIL_HOST=your_mail_host
   MAIL_PORT=your_mail_port
   MAIL_USERNAME=null
   MAIL_PASSWORD=null
   MAIL_ENCRYPTION=null
   MAIL_FROM_ADDRESS=null
   MAIL_FROM_NAME="${APP_NAME}"
   ```

2. Install dependencies using composer:

   ```
   composer install
   ```

3. Generate a new application key:

   ```
   php artisan key:generate
   ```

4. Run migrations and seed the database. This will also create a new user with the email "admin@example.com" and password "password" that can be used to log in:

   ```
   php artisan migrate --seed
   ```

5. Set up a virtual host that points to the public folder of the application.

## Features

1. Creating new activites: Users can input activity details in a form.
1. Sending to email: Users can send a uniquely generated url to a specific email address that enables the receiver to view the activities of the sender.
2. Activity Filtering: Users can filter activities based on date range using the "Filter dates" form.
3. Activity Listing: The application displays a table that lists activities with columns for activity title, description, time spent, and date.
4. Activity Actions: Users can perform actions on activities such as editing and deleting. The "Actions" column provides links to edit and delete individual activities.
5. Pagination: When there are multiple activities, the application paginates the activity list for better navigation.
6. Total Time Calculation: In the report view, the application calculates and displays the total time spent on activities.

## Usage

1. Filtering Activities:
   - Enter the desired date range in the "Filter dates" form.
   - Click the "Filter" button to apply the filter.
   - The activity table will update to display only the activities within the specified date range.
   - To reset the filter, click the "Reset" button.

2. Editing an Activity:
   - In the activity table, locate the activity you want to edit.
   - Click the "Edit" link in the "Actions" column.
   - You will be redirected to the edit page for that activity, where you can make changes and save them.

3. Deleting an Activity:
   - In the activity table, locate the activity you want to delete.
   - Click the "Delete" link in the "Actions" column.
   - A confirmation prompt will appear.
   - Click "OK" to delete the activity permanently.

4. Generating Reports:
   - Navigate to the report view by clicking on the "Report" link in the application.
   - The report view displays the total time spent on activities.
   - This can be useful for tracking overall productivity or analyzing time allocation.

5. Buttons:
   - Create Activity: This button allows users to create a new activity. It is linked to the create route.
   - Show Print Report: This button allows users to view a print friendly report. It is linked to the report.show route.
   - Send to Email: This button triggers a modal to send the activity details to an email address.

6. Pagination:
   - A pagination is set on the dashboard and it shows maximum 2 activities in the table just for demonstration.
