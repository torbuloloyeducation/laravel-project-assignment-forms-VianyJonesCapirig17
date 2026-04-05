Task 1: Understand the Flow

If you type your email and click submit. The form sends that email to the server using POST. The server grabs that email and puts it into the session. Then the page reloads, and the server checks the session and displays the email on the screen. That's how the user sees their submitted email right after the page refreshes.


Refelection Answers:

1. What is the difference between GET and POST?
GET puts data into the URL, so you can see it there. That makes it great for things like search results or links that you want to bookmark. POST hides the data inside the request it's more secure and can handle way more information, like uploads or forms.

2. Why do we use @csrf in forms?
It's a security feature. CSRF makes sure the form you're submitting actually came from your website, not some fake site trying to trick your server into doing something it shouldn't.

3. What is session used for in this activity?
Sessions help the server keep track of things like whether you're logged in or what you typed into a form.

4. What happens if session is cleared?
The server basically forgets who you are. Any temporary data gets deleted.
