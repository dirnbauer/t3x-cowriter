# TYPO3 v14 Cleanup Report

Date: 2026-04-30
Extension: t3_cowriter

## Rule Source

The requested Cursor rule files were not present in this checkout:

- .cursor/rules/typo3-extension-upgrade.mdc
- .cursor/rules/typo3-conformance.mdc
- .cursor/rules/typo3-security.mdc
- .cursor/rules/security-audit.mdc
- .cursor/rules/typo3-testing.mdc
- .cursor/rules/typo3-docs.mdc

Applied fallback rules from the installed TYPO3 and security skills:

- typo3-extension-upgrade
- typo3-conformance
- typo3-security
- security-audit
- typo3-testing
- typo3-docs

External references checked:

- TYPO3 Core API: PHPStan config should live below Build/phpstan/phpstan.neon and be run with `vendor/bin/phpstan --configuration=Build/phpstan/phpstan.neon`.
- Packagist: `saschaegerer/phpstan-typo3` 3.0.1 targets TYPO3 `^14.0` and PHPStan `^2.1.33`.
- PHPStan docs: `level: max` is the alias for the highest available rule level.
- TYPO3 Core API: TYPO3 v14 supports XLIFF 2.x and prefers it for new projects.
- TYPO3 changelog: TYPO3 14.2 supports ICU MessageFormat for named translation arguments.

## Findings

- Composer still allows TYPO3 13 via `^13.4 || ^14.0`.
- ext_emconf still allows TYPO3 `13.4.0-14.4.99`.
- PHPStan config does not declare an explicit level and relies on inherited workflow defaults.
- PHPStan config is `Build/phpstan.neon`; current TYPO3 docs use `Build/phpstan/phpstan.neon`.
- Language resources need conversion to XLIFF 2.0 and German translations where missing.
- Fluid backend status template needs a localization pass for visible labels.
- README and Documentation need explicit TYPO3 14-only requirements and updated QA commands.

## Planned Changes

- Restrict Composer dependencies to TYPO3 `^14.3` and PHP `^8.2`.
- Set ext_emconf TYPO3 constraint to `14.3.0-14.99.99`.
- Keep nr_llm dependency aligned with TYPO3 14-compatible releases.
- Add direct dev requirements for PHPStan 2.x and `saschaegerer/phpstan-typo3` 3.x where missing.
- Move or wrap PHPStan configuration so `Build/phpstan/phpstan.neon` is the canonical config and uses `level: max`.
- Convert all XLIFF files to XLIFF 2.0 with complete English/German labels.
- Replace remaining hardcoded Fluid labels with `f:translate`.
- Update README and Documentation for TYPO3 14.

## Verification Target

- `composer validate --strict`
- `composer ci:test:php:phpstan`
- focused unit/functional tests where dependencies are available
