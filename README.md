## Application Configuration Requirements

### Before install this Package, ensure the following configurations are properly set up:

1. **SSO Token Configuration**
    - The application must have the configuration key `sso.portal_sso_token` defined to communicate with Portal SSO.

2. **Encryption Key**
    - The application must include the configuration key `encryption.key`.
   
3. **Encryption Key**
    - The application must include the configuration key `encryption.iv`.

### Routes

```
    Route Name: api.unit-sad.reset-cache
    Route Path: /api/unit-sad/reset-cache
```