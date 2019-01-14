# Contribution Manual

If you wish to contribute with the project and make it better, your help is welcome.
The contribution is a great way to lean more about new technologies and it's ecosystem, make it more construtive, bugs free and keep it updated.

### How to create a pull request at Github

* In your account, create a fork of this project at Github.
* Fork at your local machine. The default `remote` of your repository will be `origin`.
* Add the original repository, as a new 'remote' named `upstream`.    
```bash
$ git remote add upstream git@github.com:vendor/repository.git
```
* Make sure to frequently update your repository with the original. 
* Create a new branch in which you are gonna make the implementation. Create from the `master` branch.
```bash
$ git checkout -b hotfix/ticket-number
```
* Implement your fix or feature, not forgetting to comment the code.
* Follow the project code style, including the corrects identations. 
* Execute all tests available to get certified that no part of the SDK was compromised by the new code.
* Write and adapt tests to your code, if necessary.
* Include a documentation of your code.
* Do `git push` of your project to your Github fork, the `remote origin`.
* At github, from your fork, create a new `pull request` from branch. Point to `develop` branch of the original project. 
* If the maintainer of the project requests any change in the code, changeyour branch and give a `push` to your Github fork. The `pull request` will be updated automatically.
* Once the code has been approved and merged in the oficial project, you can update your remote `upstream` to your local machine and remove the branches you have created.

And finally, but not less important: always comment your codes and commits. The message of your commit must describe what it will do with the code.
 
[Back](../README.en_US.md)
