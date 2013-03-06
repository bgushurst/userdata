User Data Framework
========

The User Data Framework aims to provide a complete end to end solution for sanitizing user data and providing a safe way to pass user data between controllers models and views.

One primary goal of the framework is to not only make it extremely easy to test the framework itself but also the derivative code. The framework will accomplish this by providing a wrapper for all user data and a library of premade validators, filters, and santizers which can be used for most data. Derivative classes will be able to be built easily and by their nature should be easy to test. Restricting sensitive methods within an application to only accept IUserData objects as their parameters will guarantee that no data makes it to sensitive areas without first being cleaned.