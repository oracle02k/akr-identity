# znr-identity

znr-identity utilizes psalm's static analysis to provide type Id.

## motivation

- Safely operate each Id that is generated in large quantities of master data, etc.
- In the simple way, all Ids are of type int, so there is no error even if irrelevant Ids are compared.
- Therefore, we want to apply a dedicated type to each Id so that it cannot be compared with any Id other than the same type.

## spec

- znr-identity detects the comparison of different types by static analysis and throws an error.
- znr-identity caches values so you can take advantage of strict comparisons.
