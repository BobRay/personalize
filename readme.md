Personalize Snippet for MODx Revolution
=======================================

**Revolution Author:** Bob Ray [Bob's Guides](http://bobsguides.com)
**Date:**   01/10/2011

**Documentation:** See tutorial at [Bob's Guides](http://bobsguides.com/personalize-tutorial.html)

**Bugs and Requests:** [GitHub](https://github.com/BobRay/Personalize/issues)

A snippet for MODx Revolution showing one chunk to logged-in users and
another chunk (or nothing) to anonymous users.

##Typical Snippet Call


     [[!Personalize? &yesChunk=`yesChunk` &noChunk=`noChunk`]]

##Parameters

    &yesChunk  -- (optional) Name of yes chunk or inline HTML

    &noChunk   -- (optional) Name of no chunk or inline HTML

    &ph        -- (optional) Placeholder for user name (will not be available in no chunk)

    &fullName  -- (optional) Use full name instead of username for placeholder

    &ifIds     -- (optional) Comma-separated list of users to show yesChunk to

