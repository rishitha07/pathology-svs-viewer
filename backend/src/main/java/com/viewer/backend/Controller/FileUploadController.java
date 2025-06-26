package com.viewer.backend.Controller;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import java.io.File;
import java.io.IOException;
import java.nio.file.*;
import java.util.Arrays;
import java.util.List;

@RestController
@CrossOrigin(origins = "*")
public class FileUploadController {

    private static final String UPLOAD_DIR = "/var/www/html/uploads/";

    @GetMapping("/")
    public String home() {
        return "Java backend for Pathology SVS Viewer is running!";
    }
    @PostMapping("/upload")
    public ResponseEntity<String> uploadFile(@RequestParam("svsFile") MultipartFile file) {
        try {
            Path uploadPath = Paths.get(UPLOAD_DIR);
            if (!Files.exists(uploadPath)) {
                Files.createDirectories(uploadPath);
            }

            Path filePath = uploadPath.resolve(file.getOriginalFilename());
            Files.copy(file.getInputStream(), filePath, StandardCopyOption.REPLACE_EXISTING);
            System.out.println("Uploading: " + file.getOriginalFilename());

            return ResponseEntity.ok("File uploaded: " + file.getOriginalFilename());
        } catch (IOException e) {
            e.printStackTrace();
            return ResponseEntity.status(500).body("Upload failed: " + e.getMessage());
        }
    }

    @GetMapping("/slides")
    public ResponseEntity<List<String>> listSlides() {
        File folder = new File(UPLOAD_DIR);
        String[] files = folder.list((dir, name) -> name.endsWith(".svs"));

        if (files != null) {
            return ResponseEntity.ok(Arrays.asList(files));
        } else {
            return ResponseEntity.status(500).body(List.of());
        }
    }
}
