About Ephedra
=============

Ephedra, also called Sea Grape, Joint Pine, Joint Fur, Mormon tea or
Brigham tea is a shrub native to Asia, Europe, Africa and the Americas.

![alt tag](https://drive.google.com/file/d/0B7_MV0e427VPZTBQR3pNeDZadGs/view?usp=sharing)
![](media/image1.jpeg){width="6.5in" height="6.320833333333334in"}

Also, Ephedra is a lightweight PHP-based microframework, targeted to run
in embedded devices and to be rendered in microbrowsers. Ephedra has a
small footprint. Without the documentations and sample application it is
about 1 MB. With the documentation and sample application it can grow up
to 3 MB. Ephedra is currently under development, in version 0.1, which
was tested on Raspberry pie and PC-duino based systems.

Architecture
------------

Ephedra is a combination of MVC and Decorator design patterns. It runs
on PHP version &gt; 5.3.3 and depends on Redbean for data access layer.
It ships with a candidate sample application. The following component
diagram may give a glimpse of interaction between the components of the
application:

![](media/image2.jpeg){width="6.493055555555555in"
height="6.894444444444445in"}

The components are layered into following namespaces:

1.  Models

2.  Controllers

3.  Decorators

4.  Views

5.  Helpers

6.  Config

7.  Application Registry

8.  Exceptions

9.  And the app that will be developed over this, in the sample, the
    candidate app.

    1.  The Basic Flow
        --------------

After the request reaches to Index.php, it is redirected to internal
index in the controllers. The index transfers the request to
FrontController, which then processes the request in a chain of
responsibility, and returns that response to be echoed by the Index.

![](media/image3.jpeg){width="6.4944444444444445in"
height="3.0708333333333333in"}

As we see in the above sequence diagram for the single hypothetical use
case Candidate Listing, after the FrontController receives request, it
finds the Action Handler responsible for dispatching this action. The
CandidateListHandler knows its mode and its decorator. So it first
fetches the data from the Model with the listAll call, and then it sends
the data to be processed and decorated by the view. Once the handler
receives its response from CandidateListDecorator, it returns it in the
chain to FrontController.

Directory structure
-------------------

The code have the following directory structure:

![](media/image4.jpeg){width="3.0729166666666665in"
height="5.072916666666667in"}

> Root folder

i.  Index.php (root)

ii. Readme.pdf (this file)

iii. Controllers

    1.  candidatelistactionhandler.php

    2.  frontcontroller.php

    3.  genericactionhandler.php

    4.  index.php (internal)

    5.  indexviewactionhandler.php

iv. Decorators

    1.  basedecorator.php

    2.  candidatelistdecorator.php

v.  Doc

vi. Exceptions

    1.  Incorrectviewpathexception.php

vii. Models

    1.  candidate.php

    2.  candidatemodel.php

    3.  memorymodel.php

    4.  model.php

viii. Views

    1.  candidatelist.xhtml

    2.  indexview.xhtml

    3.  normal.css

Navigating
----------

When invoked, the index.php looks like the following:

![](media/image5.jpeg){width="6.5in" height="2.2895833333333333in"}

You can go to see the sample use case of listing candidates from there,
or you can view the documentations, as shown above.

The candidate listing page may look like the following:

![](media/image6.jpeg){width="6.5in" height="2.0569444444444445in"}

You can go to the documentation space from any of the pages.

Questions or issues
-------------------

Please let me know immediately:
[*callmoni@gmail.com*](mailto:callmoni@gmail.com)

**Thank you**
