# Tasks Directory Structure

This directory contains two benchmark suites with their verified variants:

```
tasks/
├── LiveCVEBench/           # Original LiveCVEBench (183 CVEs)
├── LiveCVEBench-verified/  # Verified version with improvements
├── PatchEval/              # Original PatchEval
└── PatchEval-verified/     # Verified version with improvements
```

## What Does "-verified" Mean?

The `-verified` directories contain **maintained and improved** versions of the original benchmarks. The following summarizes the core tasks performed during the update.

---

## 1. PatchEval Maintenance

The primary objective for PatchEval was to **remove version dependencies from human-written prompts** to ensure the universality of testing logic.

* **Version Sanitization**: Removed specific software version numbers from instructions (e.g., changing "Django 1.10" to "Django"). This prevents Agents from bypassing the task by searching for or downloading pre-existing fix code for a specific version.
* **Leakage Cleanup**:
    * **Specific Path Cleanup**: Deleted `/workspace/zoraxy/fix.patch` (CVE-2024-52010).
    * **Test Patch Cleanup**: Removed `/workspace/easeprobe/test.patch` for `CVE-2023-33967` and `/workspace/kyverno/test.patch` for `CVE-2025-29778`.
    * **Global Environment Cleanup**: Completely purged all `fix.patch` and `tests.patch` files located in the `/workspace` directory across the physical environment to eliminate potential reference answer leaks.

---

## 2. LiveCVEBench (LCB) Maintenance

LCB currently contains **183** CVEs. Maintenance focused on **transitioning from static detection to dynamic verification**, **fixing environment stability issues**, and **preventing data leakage**.

### Core Modification Categories

| Dimension | Modification Summary |
| :--- | :--- |
| **Transition to Dynamic Verification** | Replaced static checks (regex matching of source code) with actual code execution, HTTP request sending, process behavior monitoring (e.g., Panic detection), or filesystem side-effect observation. |
| **Terminal Bench Adaptation** | Fixed bugs causing immediate container exits, resolved race conditions during testing, and added plugin activation wait logic. |
| **Data Leakage Cleanup** | Removed hard-coded "fixed files," POC scripts, and comments containing CVE IDs from Dockerfiles. These are now dynamically generated in `solution.sh` or moved to the `/tests` directory. |
| **Decoupling Over-binding** | Relaxed strict consistency checks for specific error messages, status codes, or encoding formats in favor of flexible semantic keyword matching or behavioral assertions. |

---

### Specific CVE Case Studies (Selected)

#### A. Environment and Script Robustness
* **CVE-2025-58760 / 54121 / 65025**: Modified `compose.yaml` or `entrypoint.sh` to include `tail -f /dev/null` or `SHOULD_EXIT` flags. This prevents the container from stopping if the service restarts or if an Agent operation causes the main process to exit.
* **CVE-2025-10162**: Added logic in `run-tests.sh` to wait for up to 3 minutes, resolving race conditions caused by asynchronous plugin activation.

#### B. From Static to Dynamic Verification
* **CVE-2025-21622 (PHP)**: Instead of matching field names in source code, the test now triggers an actual file deletion via an HTTP request.
* **CVE-2025-5874 (Redash)**: Deprecated regex matching in favor of using `importlib` to dynamically load real modules and inject Mock dependencies, executing a real attack payload to observe escape behavior.
* **CVE-2025-59531**: Changed from "reading source code for string patterns" to "running code to detect Panics."

#### C. Logic Optimization and Decoupling
* **CVE-2025-23209**: Hooked the `restore()` function to write a marker file, allowing the system to distinguish between "Verification Failed" and "Execution Failed."
* **CVE-2025-5644 (radare2)**: Replaced precise phrase matching with **semantic keyword matching** (requiring both "thread-related" and "warning-related" terms), allowing for different phrasing in developer fixes.
* **Status Code Relaxation**: For multiple cases (e.g., CVE-2025-11529), hard-coded `== 401` checks were updated to `in [400, 401, 403]`.

#### D. Removal of Invalid/Non-reproducible Cases
* **CVE-2025-5501**: Could not be reproduced due to lack of SCTP support in the Docker environment.
* **CVE-2025-9136**: Single-file Mock that depended on numerous external headers, making independent compilation impossible.
* **CVE-2025-49844**: Redis UAF (Use-After-Free) race condition window is too small for black-box testing to reliably reproduce; original version binding was retained.

---

## Which Version Should I Use?

- **For evaluation**: Use the `-verified` versions for more reliable and fair benchmarking
- **For reference**: Original versions are kept for historical comparison
