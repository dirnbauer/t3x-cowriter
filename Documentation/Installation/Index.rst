..  include:: /Includes.rst.txt

.. _installation:

============
Installation
============

The extension is installed via Composer only.

The current branch intentionally targets TYPO3 14 only. TYPO3 13 compatibility
code has been removed, and backend translations use XLIFF 2.0.

..  note::

    This extension requires the :ref:`nr-llm extension <nrllm:start>`
    for LLM provider abstraction.

Composer installation
=====================

Install via Composer (the :ref:`nr-llm <nrllm:start>` dependency
is installed automatically):

..  code-block:: bash

    composer require netresearch/t3-cowriter

After installation, activate the extensions in the TYPO3 Extension Manager or via CLI:

..  code-block:: bash

    vendor/bin/typo3 extension:activate nr_llm
    vendor/bin/typo3 extension:activate t3_cowriter

Version matrix
==============

==============  ==============  ================
Extension       TYPO3           PHP
==============  ==============  ================
current         14.3 LTS        8.2 - 8.5
==============  ==============  ================

Migration to 3.x
=================

The TYPO3 14 line uses the shared nr-llm architecture:

1.  **Install nr-llm extension**: The LLM provider abstraction is now handled
    by the separate :ref:`nr-llm extension <nrllm:start>`.

2.  **Configure providers in nr-llm**: API keys and provider settings are
    now managed through the :ref:`nr-llm configuration <nrllm:configuration>`.

3.  **Remove old configuration**: The old ``apiKey`` and ``model`` settings
    in the t3_cowriter extension are no longer used.

Benefits of the new architecture:

*   Supports multiple LLM providers (OpenAI, Claude, Gemini, OpenRouter, Mistral, Groq)
*   API keys are securely stored on the server (not exposed to frontend)
*   Centralized LLM configuration for all extensions
