Personalize Snippet for MODx Revolution
=======================================

**Revolution Author:** Bob Ray [Bob's Guides](http://bobsguides.com)
**Date:**   01/10/2011

**Documentation:** See snippet file at:
core/components/personalize/elements/snippets/personalize.inc.php

**Bugs and Requests:** [GitHub](https://github.com/BobRay/Personalize/issues)

A simple snippet for MODx Revolution showing one chunk to logged-in users and
another chunk to anonymous users.

##Minimal Snippet Call


     [[!Personalize? &yesChunk=`yesChunk` &noChunk=`noChunk`]]

##Parameters

    &yesChunk  -- (required) Name of yes chunk.

    &noChunk   -- (required) Name of no chunk.

    &ph        -- (optional) placeholder for user name (will not be available in no chunk.

    &fullName  -- (optional) Use full name instead of username for placehoder

