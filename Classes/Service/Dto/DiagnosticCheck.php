<?php

/*
 * Copyright (c) 2025-2026 Netresearch DTT GmbH
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

declare(strict_types=1);

namespace Netresearch\T3Cowriter\Service\Dto;

final readonly class DiagnosticCheck
{
    public function __construct(
        public string $key,
        public bool $passed,
        public string $message,
        public Severity $severity,
        public ?string $fixRoute = null,
    ) {}

    public function getTitle(): string
    {
        return match ($this->key) {
            'provider_exists' => 'LLM provider configured',
            'provider_active' => 'LLM provider active',
            'provider_has_api_key' => 'Provider API key configured',
            'model_exists' => 'LLM model configured',
            'model_active' => 'LLM model active',
            'configuration_exists' => 'LLM configuration created',
            'configuration_active' => 'LLM configuration active',
            'configuration_default' => 'Default LLM configuration selected',
            default => ucfirst(str_replace('_', ' ', $this->key)),
        };
    }
}
