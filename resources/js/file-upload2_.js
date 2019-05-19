const upload = multer({
  storage: multerS3({
    s3: s3,
    // bucket: 'medium-test',
    bucket: 'webdevgirl',
    acl: 'public-read',
    metadata: function (req, file, cb) {
      cb(null, {fieldName: file.fieldname});
    },
    key: function (req, file, cb) {
      cb(null, Date.now().toString())
    }
  })
})

module.exports = upload;
