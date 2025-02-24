require('dotenv').config();
const { S3Client } = require('@aws-sdk/client-s3');
const { Upload } = require('@aws-sdk/lib-storage');

class CloudStorage {
  constructor() {
    const { CLOUD_ACCESS_KEY_ID, CLOUD_SECRET_ACCESS_KEY, CLOUD_REGION, CLOUD_ENDPOINT } = process.env;

    if (!CLOUD_ACCESS_KEY_ID || !CLOUD_SECRET_ACCESS_KEY) {
        throw new Error('Missing AWS credentials in .env file');
    }

    this.s3Client = new S3Client({
      endpoint: CLOUD_ENDPOINT || 'https://hb.bizmrg.com',
      region: CLOUD_REGION || 'ru-msk',
      credentials: {
        accessKeyId: CLOUD_ACCESS_KEY_ID,
        secretAccessKey: CLOUD_SECRET_ACCESS_KEY,
      },
    });
  }

  async uploadFile(bucketName, filePath, fileContent) {
    const params = {
      Bucket: bucketName,
      Key: filePath,
      Body: fileContent,
      ContentType: 'application/octet-stream',
      ACL: 'public-read',
    };

    try {
      const upload = new Upload({
        client: this.s3Client,
        params,
      });
      const data = await upload.done();
      return data;
    } catch (error) {
      console.error('Error uploading file:', error);
      throw error;
    }
  }
}

module.exports = CloudStorage;